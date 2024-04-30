<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0c6bdff3b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/styles.css">
    <title>Visage</title>
</head>
<body>
    <header> 
        <div class="left_header">
            <h1>V</h1>
            <input placeholder="Search">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="middle_header">
           <ul>
                <li><a href="index.blade.php" class='active'><i class="fa-solid fa-house-chimney"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-users-line"></i></a></li>
                <li><a href="#toggle"><i class="fa-solid fa-bars"></i></a></li>
           </ul>
        </div>
        <div class="right_header">
           
            <ul>
                <li><a href="#profile"><i class="fa-solid fa-user"></i></a></li>
                <li><a href="#notifications"><i class="fa-regular fa-bell"></i></a></li>
                <li><a href="#users"><i class="fa-solid fa-user-plus"></i></a></li>
                <li><a href="#messenger"><i class="fa-regular fa-comment-dots"></i></a></li>
           </ul>
        </div>
    </header>
    <main>
        <section>
            <div class="posting-container">
                <div class="text-post">
                    <h3>Text</h3>
                </div>
                <div class="image-post">
                    <h3>Image</h3>
                </div>
                <div class="input-container">
                    <form action="">
                        <div>
                            <input type="text" id="text" name="text" placeholder="What's on your mind?">
                            <input type="submit" name="submitPost" id="submitPost">
                        </div>
                    </form>
                </div>
            </div>
            <div class="posts">
            <table>
                <tr>
                    <th colspan="2"><div><img src="../../../public/Images/macska.jpg" alt="valaki"></div><h2>Username</h2></th>
                </tr>
                <tr>
                    <th colspan="2"><img src="../../../public/Images/forest.png"></th>
                </tr>
                <tr>
                    <td class="reaction"><i class="fa-solid fa-thumbs-up"></i> Like</td>
                    <td class="comment"><i class="fa-solid fa-comment"></i> Comment</td>
                </tr>
                <tr class="comments">
                    <td colspan="2">
                            <ul>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>Azta kurva</p></li>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>Bojler eladó</p></li>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>irni setucc</p></li>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, velit doloremque tenetur officia impedit dolores cumque veritatis expedita necessitatibus optio minus saepe atque ea ab non libero debitis dolorem sapiente!</p></li>
                            </ul>
                    </td>
                </tr>
                <tr class="user-comment">
                    <td colspan="2">
                        <form action="">
                            <div>
                                <textarea name="comment" id="comment" rows="1"></textarea  placeholder="write something...">
                                <input type="submit" name="submitComment" id="submitComment">
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="2"><h2>Username</h2></th>
                </tr>
                <tr>
                    <th colspan="2"><img src="../../../public/Images/forest.png"></th>
                </tr>
                <tr>
                    <td class="reaction"><i class="fa-solid fa-thumbs-up"></i> Like</td>
                    <td class="comment"><i class="fa-solid fa-comment"></i> Comment</td>
                </tr>
                <tr class="comments">
                    <td colspan="2">
                            <ul>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>Azta kurva</p></li>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>Bojler eladó</p></li>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>irni setucc</p></li>
                                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, velit doloremque tenetur officia impedit dolores cumque veritatis expedita necessitatibus optio minus saepe atque ea ab non libero debitis dolorem sapiente!</p></li>
                            </ul>
                    </td>
                </tr>
                <tr class="user-comment">
                    <td colspan="2">
                        <form action="">
                            <div>
                                <textarea name="comment" id="comment" placeholder="write something..."></textarea>
                                <input type="submit" name="submitComment" id="submitComment">
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
            </div>
        </section>
        <aside>
        <div class="messenger">
            <ul class="message-friends">
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Jani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Dani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Karcsi</li>
                <li><div></div>Juli</li>
                <li class="active"><div><img src="../../../public/Images/macska.jpg" alt=""></div>Mari</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Mari</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Jani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Dani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Karcsi</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Jani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Dani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Karcsi</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Mari</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Jani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Dani</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Karcsi</li>
                <li><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</li>
            </ul>
            <div class="chat">
                <div class="chat-heading">
                    <h1>Mari</h1>
                </div>
                <div class="chat-messages">
                    <div class="recived-chat"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error eum quaerat debitis sapiente. Dolorum iusto hic quae repellendus nam esse est tempora, dolor labore voluptates quibusdam saepe, eius deserunt. Ipsum?</p></div>
                    <div class="sent-chat"><p>Szia uram!</p></div>
                    <div class="recived-chat"><p>Szia tesomsz</p></div>
                    <div class="sent-chat"><p>Szia uram!</p></div>
                    <div class="recived-chat"><p>Szia tesomsz</p></div>
                    <div class="sent-chat"><p>Szia uram!</p></div>
                    <div class="recived-chat"><p>Szia tesomsz</p></div>
                    <div class="sent-chat"><p>Szia uram!</p></div>
                    <div class="recived-chat"><p>Szia tesomsz</p></div>
                    <div class="sent-chat"><p>Szia uram!</p></div>
                    <div class="recived-chat"><p>Szia tesomsz</p></div>
                    <div class="sent-chat"><p>Szia uram!</p></div>
                    <div class="recived-chat"><p>Szia tesomsz</p></div>
                    <div class="sent-chat"><p>Szia urammmmmmm!</p></div>
                </div>
                <div class="user-input">
                    <form action="">
                            <textarea name="privMess" id="privMess"></textarea>
                            <input type="submit" value="Send">
                    </form>
                </div>
            </div>
        </div>
        <div class="users">
           <table>
                <tr>
                    <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></td>
                    <td><h2>Kalányos János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
        </table>
        </div>
        <div class="notifications">

        </div>
        <div class="profile-sidebar">
            <ul>
                <li><a href="profile.blade.php">Profile</a></li>
                <li><a href="">Log out</a></li>
            </ul>
        </div>
        </aside>
    </main>
    <script src="../../js/main.js"></script>
    <script src="../../js/index.js"></script>
</body>
</html>