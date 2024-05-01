@extends('layouts.inner_app')
@section('js')
    @vite('resources/js/groups.js')
@endsection   
    <main>
        <section>
            <div class="posting-container">
                <div class="create">
                    <h2 class="active">Create Group</h2>
                </div>
                <div class="cg-input-container">
                    <form action="">
                        <div>
                            <input type="text" name="groupName" id="groupName" placeholder="Group name....">
                            <input type="submit" value="Create">
                        </div>
                      
                    </form>
                </div>
            </div>
            <div class="groups">
                <ul>
                    <li><a href="#view" class="active">View</a></li>
                    <li><a href="#join">Join</a></li>
                </ul>
                <table class="view">
                    <tr>
                        <td><img src="../../../public/Images/macska.jpg" alt=""></td>
                        <td><h1>Szipus Macskák</h1></td>
                        <td><a href=""><button>View</button></a></td>
                    </tr>
                    <tr>
                        <td><img src="../../../public/Images/macska.jpg" alt=""></td>
                        <td><h1>Szipus Macskák</h1></td>
                        <td><a href=""><button>View</button></a></td>
                    </tr>
                </table>

                <table class="join noDisplay">
                    <tr>
                        <td><img src="../../../public/Images/macska.jpg" alt=""></td>
                        <td><h1>Szipus Macskák</h1></td>
                        <td><a href=""><button>Join</button></a></td>
                    </tr>
                    <tr>
                        <td><img src="../../../public/Images/macska.jpg" alt=""></td>
                        <td><h1>Szipus Macskák</h1></td>
                        <td><a href=""><button>Join</button></a></td>
                    </tr>
                </table>
            </div>
        </section>
        <aside>
        <div class="messenger">
            <ul class="message-friends">
                <li><a href=""><img src="../../../public/Images/macska.jpg" alt="">Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href="" class="active"><div><img src="../../../public/Images/macska.jpg" alt=""></div>Mari</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
                <li><a href=""><div><img src="../../../public/Images/macska.jpg" alt=""></div>Julcsi</a></li>
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
            <ul>
                <li><a href="#Suggestions" class="active"><h3>Suggestions</h3></a></li>
                <li><a href="#Requests"><h3>Requests</h3></a></li>
            </ul>
            <table class="suggestions">
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
                <tr>
                <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kalányos János</h2></td>
                    <td><button>Add Friend</button></td>
                </tr>
            </table>
            <table class="requests noDisplay">
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Accept</button></td>
                    <td><button>Decline</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Accept</button></td>
                    <td><button>Decline</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Accept</button></td>
                    <td><button>Decline</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Accept</button></td>
                    <td><button>Decline</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Accept</button></td>
                    <td><button>Decline</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><button>Accept</button></td>
                    <td><button>Decline</button></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kalányos János</h2></td>
                    <td><button>Accept</button></td>
                    <td><button>Decline</button></td>
                </tr>
            </table>
        </div>
        <div class="notifications">
            <table>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> reacted to your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> commented on your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> has Posted a new Image</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> reacted to your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> commented on your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> has Posted a new Image</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> reacted to your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> commented on your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> has Posted a new Image</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> reacted to your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> commented on your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> has Posted a new Image</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> reacted to your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> commented on your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> has Posted a new Image</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> reacted to your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> commented on your Post</p></td> 
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><p><span>Kálmán János</span> has Posted a new Image</p></td> 
                </tr>
            </table>
        </div>
        <div class="profile-sidebar">
            <ul>
                <li><a href="profile.blade.php">Profile</a></li>
                <li><a href="">Log out</a></li>
            </ul>
        </div>
        </aside>
</main>
 