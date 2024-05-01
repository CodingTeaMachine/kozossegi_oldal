ALTER SESSION SET CURRENT_SCHEMA = C##kozossegi_oldal;

-- Get UserId list

CREATE OR REPLACE TYPE user_id_list IS TABLE OF INT;

CREATE OR REPLACE FUNCTION get_friend_id_list(userId IN int) RETURN C##KOZOSSEGI_OLDAL.user_id_list IS
    userIds user_id_list := user_id_list();
BEGIN
    FOR friend IN (SELECT FOGADO_AZONOSITO, KERELMEZO_AZONOSITO
                   FROM ISMEROS
                   WHERE KERELMEZO_AZONOSITO = userId
                      OR FOGADO_AZONOSITO = userId)
        LOOP
            IF NOT userIds.EXISTS(friend.KERELMEZO_AZONOSITO) THEN
                userIds.EXTEND;
                userIds(userIds.LAST) := friend.KERELMEZO_AZONOSITO;
            END IF;

            IF NOT userIds.EXISTS(friend.FOGADO_AZONOSITO) THEN
                userIds.EXTEND;
                userIds(userIds.LAST) := friend.FOGADO_AZONOSITO;
            END IF;
        END LOOP;

    RETURN userIds;
END;
/

DROP TYPE post_comment_table;

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
        FOR postComment IN (SELECT * FROM SZOVEGES_BEJEGYZES_KOMMENT WHERE SZOVEGES_BEJEGYZES_AZONOSITO = postId) LOOP
            post_comments.extend;
            post_comments(inter_index) := post_comment(postComment.AZONOSITO, postComment.SZOVEG, postComment.ELKULDESI_IDO, postComment.FELHASZNALO_AZONOSITO, get_username( postComment.FELHASZNALO_AZONOSITO), postId);
            inter_index := inter_index + 1;
        END LOOP;
    ELSE
        FOR postComment IN (SELECT * FROM KEPES_BEJEGYZES_KOMMENT WHERE KEPES_BEJEGYZES_AZONOSITO = postId) LOOP
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
    RETURN firstname || lastname;
END;

DROP TYPE post_list_table;

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
