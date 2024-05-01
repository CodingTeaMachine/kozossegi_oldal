ALTER SESSION SET CURRENT_SCHEMA = C##kozossegi_oldal;

-- Get UserId list

CREATE OR REPLACE TYPE user_id_list IS TABLE OF INT;

CREATE OR REPLACE FUNCTION get_friend_id_list(userId IN int) RETURN C##KOZOSSEGI_OLDAL.user_id_list IS
    userIds user_id_list := user_id_list();
    iter_index PLS_INTEGER := 1;
    found INT := 0;
BEGIN
    FOR friend IN (SELECT FOGADO_AZONOSITO, KERELMEZO_AZONOSITO
                   FROM ISMEROS
                   WHERE KERELMEZO_AZONOSITO = userId
                      OR FOGADO_AZONOSITO = userId)
        LOOP

            SELECT COUNT(*) INTO found FROM TABLE ( userIds ) WHERE COLUMN_VALUE = friend.KERELMEZO_AZONOSITO;

            IF found = 0 THEN
                userIds.EXTEND;
                userIds(iter_index) := friend.KERELMEZO_AZONOSITO;
                iter_index := iter_index + 1;
            END IF;

            SELECT COUNT(*) INTO found FROM TABLE ( userIds ) WHERE COLUMN_VALUE = friend.FOGADO_AZONOSITO;

            IF found = 0 THEN
                userIds.EXTEND;
                userIds(iter_index) := friend.FOGADO_AZONOSITO;
                iter_index := iter_index + 1;
            END IF;

        END LOOP;

    RETURN userIds;
END;
/

CREATE OR REPLACE TYPE post_comment AS OBJECT
(
    commentId NUMBER(10),
    content CLOB,
    createdAt TIMESTAMP(6),
    userId NUMBER(10),
    username VARCHAR2(300),
    postId NUMBER(10)
);

CREATE OR REPLACE TYPE post_comment_table IS TABLE OF post_comment;

CREATE OR REPLACE FUNCTION get_comments(postId IN INT, postType IN VARCHAR2) RETURN post_comment_table IS
    post_comments post_comment_table := post_comment_table();
    inter_index PLS_INTEGER := 1;
BEGIN

    IF (postType = 'TEXT') THEN
        FOR postComment IN (SELECT * FROM SZOVEGES_BEJEGYZES_KOMMENT WHERE SZOVEGES_BEJEGYZES_AZONOSITO = postId ORDER BY ELKULDESI_IDO) LOOP
            post_comments.extend;
            post_comments(inter_index) := post_comment(postComment.AZONOSITO, postComment.SZOVEG, postComment.ELKULDESI_IDO, postComment.FELHASZNALO_AZONOSITO, get_username( postComment.FELHASZNALO_AZONOSITO), postId);
            inter_index := inter_index + 1;
        END LOOP;
    ELSE
        FOR postComment IN (SELECT * FROM KEPES_BEJEGYZES_KOMMENT WHERE KEPES_BEJEGYZES_AZONOSITO = postId ORDER BY ELKULDESI_IDO) LOOP
            post_comments.extend;
            post_comments(inter_index) := post_comment(postComment.AZONOSITO, postComment.SZOVEG, postComment.ELKULDESI_IDO, postComment.FELHASZNALO_AZONOSITO, get_username( postComment.FELHASZNALO_AZONOSITO), postId);
            inter_index := inter_index + 1;
        END LOOP;
    END IF;

    RETURN post_comments;
END;
/

CREATE OR REPLACE FUNCTION get_username(userId IN INT) RETURN VARCHAR2 IS
    firstname VARCHAR2(300);
    lastname VARCHAR2(300);
BEGIN

    SELECT VEZETEKNEV, KERESZTNEV INTO firstname, lastname FROM FELHASZNALO WHERE AZONOSITO = userId;
    RETURN firstname || ' ' || lastname;
END;

CREATE OR REPLACE TYPE post_recommendation AS OBJECT
(
    postId       NUMBER(10),
    content      CLOB,
    image        VARCHAR2(12),
    userId       NUMBER(10),
    username     VARCHAR2(300),
    createdAt    TIMESTAMP(6),
    postType     VARCHAR2(5),
    likeCount    INT,
    dislikeCount INT
);

CREATE OR REPLACE TYPE post_list_table IS TABLE OF post_recommendation;

-- Get post list
CREATE OR REPLACE FUNCTION get_post_recommendations_for_user(userId IN INT) RETURN C##KOZOSSEGI_OLDAL.post_list_table IS
    post_list    post_list_table                 := post_list_table();
    user_id_list C##KOZOSSEGI_OLDAL.user_id_list := get_friend_id_list(userId);
    iter_index   PLS_INTEGER                     := 1;
    likeCount    INT;
    dislikeCount INT;
BEGIN
    FOR m_post IN (SELECT * FROM SZOVEGES_BEJEGYZES WHERE FELHASZNALO_AZONOSITO IN (SELECT * FROM TABLE (user_id_list)))
        LOOP
            post_list.extend;

            SELECT COUNT(*) INTO likeCount FROM SZOVEGES_BEJEGYZES_REAKCIO WHERE REAKCIO = 1 AND SZOVEGES_BEJEGYZES_AZONOSITO = m_post.AZONOSITO;
            SELECT COUNT(*) INTO dislikeCount FROM SZOVEGES_BEJEGYZES_REAKCIO WHERE REAKCIO = 0 AND SZOVEGES_BEJEGYZES_AZONOSITO = m_post.AZONOSITO;

            post_list(iter_index) :=
                post_recommendation(m_post.AZONOSITO, m_post.SZOVEG, null, m_post.FELHASZNALO_AZONOSITO, get_username(m_post.FELHASZNALO_AZONOSITO),
                                    m_post.KOZZETETELI_IDO, 'TEXT', likeCount, dislikeCount);
            iter_index := iter_index + 1;
        END LOOP;

    FOR i_post IN (SELECT * FROM KEPES_BEJEGYZES WHERE FELHASZNALO_AZONOSITO IN (SELECT * FROM TABLE (user_id_list)))
        LOOP
            post_list.extend;
            SELECT COUNT(*) INTO likeCount FROM KEPES_BEJEGYZES_REAKCIO WHERE REAKCIO = 1 AND KEPES_BEJEGYZES_AZONOSITO = i_post.AZONOSITO;
            SELECT COUNT(*) INTO dislikeCount FROM KEPES_BEJEGYZES_REAKCIO WHERE REAKCIO = 0 AND KEPES_BEJEGYZES_AZONOSITO = i_post.AZONOSITO;

            post_list(iter_index) :=
                post_recommendation(i_post.AZONOSITO, null, i_post.KEP, i_post.FELHASZNALO_AZONOSITO, get_username(i_post.FELHASZNALO_AZONOSITO),
                                    i_post.KOZZETETELI_IDO, 'IMAGE', likeCount, dislikeCount);
            iter_index := iter_index + 1;
        END LOOP;

    RETURN post_list;
END;
/


CREATE OR REPLACE TRIGGER trigger_kepes_bejegyzes_reakcio_aggregate_create_row
    AFTER INSERT ON KEPES_BEJEGYZES
    FOR EACH ROW
BEGIN
    INSERT INTO KEPES_BEJEGYZES_REAKCIO_AGGREGATE(BEJEGYZES_AZONOSITO) VALUES NEW.AZONOSITO;
END;

CREATE OR REPLACE TRIGGER trigger_szoveges_bejegyzes_reakcio_aggregate_create_row
    AFTER INSERT ON SZOVEGES_BEJEGYZES
    FOR EACH ROW
BEGIN
    INSERT INTO SZOVEGES_BEJEGYZES_REAKCIO_AGGREGATE(BEJEGYZES_AZONOSITO) VALUES NEW.AZONOSITO;
END;


CREATE OR REPLACE TRIGGER trigger_kepes_bejegyzes_reakcio_aggregate
    AFTER INSERT ON KEPES_BEJEGYZES_REAKCIO
    FOR EACH ROW
BEGIN

    IF (:NEW.REAKCIO = 1) THEN
        UPDATE
            KEPES_BEJEGYZES_REAKCIO_AGGREGATE
        SET AGGREGALT_LIKE_MENNYISEG =
            (SELECT AGGREGALT_LIKE_MENNYISEG
             FROM KEPES_BEJEGYZES_REAKCIO_AGGREGATE
             WHERE BEJEGYZES_AZONOSITO = :NEW.KEPES_BEJEGYZES_AZONOSITO) + 1
        WHERE BEJEGYZES_AZONOSITO = :NEW.KEPES_BEJEGYZES_AZONOSITO;
    ELSE
        UPDATE
            KEPES_BEJEGYZES_REAKCIO_AGGREGATE
        SET AGGREGALT_DISLIKE_MENNYISEG =
                (SELECT AGGREGALT_DISLIKE_MENNYISEG
                 FROM KEPES_BEJEGYZES_REAKCIO_AGGREGATE
                 WHERE BEJEGYZES_AZONOSITO = :NEW.KEPES_BEJEGYZES_AZONOSITO) + 1
        WHERE BEJEGYZES_AZONOSITO = :NEW.KEPES_BEJEGYZES_AZONOSITO;
    END IF;
END;

CREATE OR REPLACE TRIGGER trigger_szoveges_bejegyzes_reakcio_aggregate
    AFTER INSERT ON SZOVEGES_BEJEGYZES_REAKCIO
    FOR EACH ROW
BEGIN

    IF (:NEW.REAKCIO = 1) THEN
        UPDATE
            SZOVEGES_BEJEGYZES_REAKCIO_AGGREGATE
        SET AGGREGALT_LIKE_MENNYISEG =
                (SELECT AGGREGALT_LIKE_MENNYISEG
                 FROM SZOVEGES_BEJEGYZES_REAKCIO_AGGREGATE
                 WHERE BEJEGYZES_AZONOSITO = :NEW.SZOVEGES_BEJEGYZES_AZONOSITO) + 1
        WHERE BEJEGYZES_AZONOSITO = :NEW.SZOVEGES_BEJEGYZES_AZONOSITO;
    ELSE
        UPDATE
            SZOVEGES_BEJEGYZES_REAKCIO_AGGREGATE
        SET AGGREGALT_DISLIKE_MENNYISEG =
                (SELECT AGGREGALT_DISLIKE_MENNYISEG
                 FROM SZOVEGES_BEJEGYZES_REAKCIO_AGGREGATE
                 WHERE BEJEGYZES_AZONOSITO = :NEW.SZOVEGES_BEJEGYZES_AZONOSITO) + 1
        WHERE BEJEGYZES_AZONOSITO = :NEW.SZOVEGES_BEJEGYZES_AZONOSITO;
    END IF;
END;
