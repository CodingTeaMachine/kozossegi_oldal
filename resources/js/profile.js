document.addEventListener('DOMContentLoaded', () => {
    const posts = document.querySelector('.posts');
    const friends = document.querySelector('.friends');
    const about = document.querySelector('.user-data');
    const navLinks = document.querySelectorAll('nav a');
    let postsLink;
    let friendsLink; 
    let aboutLink;
    navLinks.forEach(navLink => {
        if(navLink.getAttribute('href').slice(1) === 'Posts') postsLink = navLink;
        if(navLink.getAttribute('href').slice(1) === 'Friends') friendsLink = navLink;
        if(navLink.getAttribute('href').slice(1) === 'About') aboutLink = navLink;
    });

    postsLink.addEventListener('click', () => {
        posts.classList.remove('noDisplay');
        postsLink.classList.add('active');
        
        friends.classList.add('noDisplay');
        friendsLink.classList.remove('active');
        about.classList.add('noDisplay');
        aboutLink.classList.remove('active');
    });
    friendsLink.addEventListener('click', () => {
        friends.classList.remove('noDisplay');
        friendsLink.classList.add('active');
        posts.classList.add('noDisplay');
        postsLink.classList.remove('active');
        about.classList.add('noDisplay');
        aboutLink.classList.remove('active');
    });
    aboutLink.addEventListener('click', () => {
        about.classList.remove('noDisplay');
        aboutLink.classList.add('active');
        friends.classList.add('noDisplay');
        friendsLink.classList.remove('active');
        posts.classList.add('noDisplay');
        postsLink.classList.remove('active');
    });
});