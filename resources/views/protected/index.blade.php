@php use App\Models\DTO\Post\PostsForUserDTO;use Illuminate\Support\Facades\Vite; @endphp
@extends('layouts.inner_app')


@php

    /**
     * @var array $response
     */

    /**
    * @type PostsForUserDTO[] $posts
     */
    $posts = $response['posts'];
@endphp

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
            @foreach($posts as $post)
                <table>
                    <tr>
                        <th colspan="2">
                           <div> <img src="{{Vite::asset('resources/Images/macska.jpg')}}" alt=""></div>
                            <h2>{{$post->userName}} - {{$post->createdAt}}</h2></th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div>
                                {{$post->content}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>{{$post->likesCount}} (like)</td>
                        <td>{{$post->dislikesCount}} (dislike)</td>
                    </tr>
                    <tr>
                        <td class="reaction"><i class="fa-solid fa-thumbs-up"></i> Like</td>
                        <td class="comment"><i class="fa-solid fa-comment"></i> Comment ({{count($post->comments)}})</td>
                    </tr>
                    <tr class="comments">
                        <td colspan="2">
                            <ul>
                                @foreach($post->comments as $comment)
                                    <li>
                                        <div>
                                            <img src="{{Vite::asset('resources/Images/macska.jpg')}}" alt="">
                                        </div>
                                        <p>{{$comment->content}}</p>
                                    </li>
                                @endforeach
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
            @endforeach
        </div>
    </section>
    <aside>
        <div class="messenger">
            <ul class="message-friends">
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="" class="active">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Mari</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
                <li><a href="">
                        <div><img src="../../../public/Images/macska.jpg" alt=""></div>
                        Julcsi</a></li>
            </ul>
            <div class="chat">
                <div class="chat-heading">
                    <h1>Mari</h1>
                </div>
                <div class="chat-messages">
                    <div class="recived-chat"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error eum
                            quaerat debitis sapiente. Dolorum iusto hic quae repellendus nam esse est tempora, dolor
                            labore voluptates quibusdam saepe, eius deserunt. Ipsum?</p></div>
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
                    <td>
                        <button>Add Friend</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Add Friend</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Add Friend</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Add Friend</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Add Friend</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Add Friend</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kalányos János</h2></td>
                    <td>
                        <button>Add Friend</button>
                    </td>
                </tr>
            </table>
            <table class="requests noDisplay">
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Accept</button>
                    </td>
                    <td>
                        <button>Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Accept</button>
                    </td>
                    <td>
                        <button>Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Accept</button>
                    </td>
                    <td>
                        <button>Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Accept</button>
                    </td>
                    <td>
                        <button>Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Accept</button>
                    </td>
                    <td>
                        <button>Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td>
                        <button>Accept</button>
                    </td>
                    <td>
                        <button>Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kalányos János</h2></td>
                    <td>
                        <button>Accept</button>
                    </td>
                    <td>
                        <button>Decline</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="notifications">
            <table>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><p>Reacted to your Post</p></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><p>Commented on your Post</p></td>
                </tr>
                <tr>
                    <td><a href=""><img src="../../../public/Images/macska.jpg" alt="" class="avatar"></a></td>
                    <td><h2>Kálmán János</h2></td>
                    <td><p>Has Posted a new Image</p></td>
                </tr>
            </table>
        </div>
        <div class="profile-sidebar">
            <ul>
                <li><a href="profile.blade.php">Profile</a></li>
                <li>
                    <form action="/logout" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="submit" value="Logout">
                    </form>
                </li>
            </ul>
        </div>
    </aside>
</main>
