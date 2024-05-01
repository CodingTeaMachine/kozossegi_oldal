document.addEventListener('DOMContentLoaded', () => {
    const btns = document.querySelectorAll('.right_header ul li a');
    const messengerDisplay = document.querySelector('.messenger');
    const usersDisplay = document.querySelector('.users');
    const notificationsDisplay = document.querySelector('.notifications');
    const profileSidebar = document.querySelector('.profile-sidebar');
    let messengerBtn;
    let usersBtn;
    let notificationsBtn;
    let profileBtn;
    const section = document.querySelector('section');
    const aside = document.querySelector('aside');
    btns.forEach(btn => {
        if(btn.getAttribute('href').slice(1) === 'messenger') messengerBtn = btn;
        if(btn.getAttribute('href').slice(1) === 'users') usersBtn = btn;
        if(btn.getAttribute('href').slice(1) === 'notifications') notificationsBtn = btn;
        if(btn.getAttribute('href').slice(1) === 'profile') profileBtn = btn;
        
    });
    messengerBtn.addEventListener('click', () => {
        
        if(!messengerBtn.classList.contains('active')){
            aside.classList.add('displayAside');
            section.style.transform = 'translateX(0%)';
        
        } else{
            aside.classList.remove('displayAside');
            if(window.innerWidth > 1200){
                section.style.transform = ' translateX(calc(100%/3))';
            }
            
    
        }
        
        messengerDisplay.classList.toggle('show');
        messengerBtn.classList.toggle('active');
        usersDisplay.classList.remove('show');
        usersBtn.classList.remove('active');
        notificationsDisplay.classList.remove('show');
        notificationsBtn.classList.remove('active');
        if(messengerBtn.classList.contains('active') && window.innerWidth <= 1200){
            document.body.style.overflowY = "hidden";
        } else{
            document.body.style.overflowY = "scroll";
        }
        
    });
    usersBtn.addEventListener('click', () => {
        if(!usersBtn.classList.contains('active')){
            aside.classList.add('displayAside');
            section.style.transform = 'translateX(0%)';
        } else{
            aside.classList.remove('displayAside');
            if(window.innerWidth > 1200){
                section.style.transform = ' translateX(calc(100%/3))';
            }
        }

        usersDisplay.classList.toggle('show');
        usersBtn.classList.toggle('active');
        messengerDisplay.classList.remove('show');
        messengerBtn.classList.remove('active');
        notificationsDisplay.classList.remove('show');
        notificationsBtn.classList.remove('active');
        if(usersBtn.classList.contains('active') && window.innerWidth <= 1200){
            document.body.style.overflowY = "hidden";
        } else{
            document.body.style.overflowY = "scroll";
        }
    });
    notificationsBtn.addEventListener('click', () => {

        if(!notificationsBtn.classList.contains('active')){
            aside.classList.add('displayAside');
            section.style.transform = 'translateX(0%)';
        } else{
            aside.classList.remove('displayAside');
            if(window.innerWidth > 1200){
                section.style.transform = ' translateX(calc(100%/3))';
            }
        }
        notificationsDisplay.classList.toggle('show');
        notificationsBtn.classList.toggle('active');
        messengerDisplay.classList.remove('show');
        messengerBtn.classList.remove('active');
        usersDisplay.classList.remove('show');
        usersBtn.classList.remove('active');
        if(notificationsBtn.classList.contains('active') && window.innerWidth <= 1200){
            document.body.style.overflowY = "hidden";
        } else{
            document.body.style.overflowY = "scroll";
        }
    });
    profileBtn.addEventListener('click', () => {
        profileSidebar.classList.toggle('show');
        profileBtn.classList.toggle('active');
        
    });
    
    btns.forEach(btn => {
        if(btn.classList.contains('active') && window.innerWidth <= 1200){
            document.body.style.overflowY = "hidden";
        } else{
            document.body.style.overflowY = "scroll";
        }
    })
    //Navbar toggle
   const middleLinks = document.querySelectorAll('.middle_header a');
   const navbar = document.querySelector('.right_header');
   const main = document.querySelector('main');
   let toggleNav;
   middleLinks.forEach((link) => {
        if(link.getAttribute('href').slice(1) === 'toggle') toggleNav = link;

   });
   toggleNav.addEventListener('click', () => {
        navbar.classList.toggle('showNav');
        if(getComputedStyle(navbar.children[0]).visibility === 'hidden'){
            setTimeout(() => {
                navbar.children[0].style.visibility = 'visible'; 
            }, 500);
            main.style.top = '120px';
            messengerDisplay.style.height = 'calc(100vh - 120px)';
            usersDisplay.style.height = 'calc(100vh - 120px)';
            notificationsDisplay.style.height = 'calc(100vh - 120px)';
            if(window.innerWidth <= 480){
                main.style.top = '80px';
                messengerDisplay.style.height = 'calc(100vh - 80px)';
                usersDisplay.style.height = 'calc(100vh - 80px)';
                notificationsDisplay.style.height = 'calc(100vh - 80px)';
            }
            toggleNav.classList.add('active');
        } 
        else{
            navbar.children[0].style.visibility = 'hidden';
            main.style.top = '60px';
            messengerDisplay.style.height = 'calc(100vh - 60px)';
            usersDisplay.style.height = 'calc(100vh - 60px)';
            notificationsDisplay.style.height = 'calc(100vh - 60px)';
            if(window.innerWidth <= 480){
                main.style.top = '40px';
                messengerDisplay.style.height = 'calc(100vh - 40px)';
                usersDisplay.style.height = 'calc(100vh - 40px)';
                notificationsDisplay.style.height = 'calc(100vh - 40px)';
            }
            toggleNav.classList.remove('active');
        }
    });
    window.addEventListener('resize', () => {
        if(window.innerWidth > 1200){
            
            if(navbar.classList.contains('showNav')){
                navbar.classList.remove('showNav');
                main.style.top = '60px';
                messengerDisplay.style.height = 'calc(100vh - 60px)';
                usersDisplay.style.height = 'calc(100vh - 60px)';
                notificationsDisplay.style.height = 'calc(100vh - 60px)';
                if(window.innerWidth <= 480){
                    main.style.top = '40px';
                    messengerDisplay.style.height = 'calc(100vh - 40px)';
                    usersDisplay.style.height = 'calc(100vh - 40px)';
                    notificationsDisplay.style.height = 'calc(100vh - 40px)';
                }
                toggleNav.classList.remove('active');
            }             
            navbar.children[0].style.visibility = 'visible';
            if(document.body.style.overflowY === "hidden"){
                document.body.style.overflowY = "scroll";
            }
            if(!aside.classList.contains('displayAside')) section.style.transform = ' translateX(calc(100%/3))';

        } else {
            section.style.transform = ' translateX(0)';
            if(!navbar.classList.contains('showNav')){
                main.style.top = '60px';
                messengerDisplay.style.height = 'calc(100vh - 60px)';
                usersDisplay.style.height = 'calc(100vh - 60px)';
                notificationsDisplay.style.height = 'calc(100vh - 60px)';
                if(window.innerWidth <= 480){
                    main.style.top = '40px';
                    messengerDisplay.style.height = 'calc(100vh - 40px)';
                    usersDisplay.style.height = 'calc(100vh - 40px)';
                    notificationsDisplay.style.height = 'calc(100vh - 40px)';
                }
                navbar.children[0].style.visibility = 'hidden';
            }
            if(aside.classList.contains('displayAside')){
                document.body.style.overflowY = "hidden";
            }
        }
        
    });
    
    //Toggle between friend request and suggestions
    const usersLinks = document.querySelectorAll('.users ul li a');
    let userSuggestions;
    let userRequests;
    const suggestionsDisplay = document.querySelector('.suggestions');
    const requestDisplay = document.querySelector('.requests');
    usersLinks.forEach(userlink => {
        if(userlink.getAttribute('href').slice(1) === "Suggestions") userSuggestions = userlink;
        if(userlink.getAttribute('href').slice(1) === "Requests") userRequests = userlink;
    });
   
    userSuggestions.addEventListener('click', () => {
        if(suggestionsDisplay.classList.contains('noDisplay')){
            suggestionsDisplay.classList.remove('noDisplay');
            userSuggestions.classList.add('active'); 
            requestDisplay.classList.add('noDisplay');
            userRequests.classList.remove('active');  
        }
    });
    userRequests.addEventListener('click', () => {
        if(requestDisplay.classList.contains('noDisplay')){
            requestDisplay.classList.remove('noDisplay');
            userRequests.classList.add('active');
            suggestionsDisplay.classList.add('noDisplay');
            userSuggestions.classList.remove('active'); 
        }
    });
    //Posting inputs
    const inputContainer = document.querySelector('.input-container');
    const input = document.querySelector('.input-container form input');
    const textPost = document.querySelector('.text-post');
    const imagePost = document.querySelector('.image-post');
    
    textPost.addEventListener('click', () => {
        if(!inputContainer.classList.contains('displayed')){
            inputContainer.classList.add('displayed');
            textPost.firstElementChild.classList.add('active');
        } else {
            inputContainer.classList.remove('displayed');
            textPost.firstElementChild.classList.remove('active');
        }
        if(input.getAttribute('type') !== 'text'){
            input.setAttribute('type', 'text');
            input.setAttribute('id', 'text');
            input.setAttribute('name', 'text');
            inputContainer.classList.add('displayed');
            textPost.firstElementChild.classList.add('active');
        }
        
        imagePost.firstElementChild.classList.remove('active');
        
    });
    imagePost.addEventListener('click', () => {
        if(!inputContainer.classList.contains('displayed')){
            inputContainer.classList.add('displayed');
            imagePost.firstElementChild.classList.add('active');
        } else{
            inputContainer.classList.remove('displayed');
            imagePost.firstElementChild.classList.remove('active')
        }
        if(input.getAttribute('type') !== 'file'){
            input.setAttribute('type', 'file');
            input.setAttribute('id', 'image');
            input.setAttribute('name', 'image');
            inputContainer.classList.add('displayed');
            imagePost.firstElementChild.classList.add('active');
        }
        textPost.firstElementChild.classList.remove('active');
    });

    //Kommentelés

   const commentBtns = document.querySelectorAll('.comment');
   const posts = document.querySelectorAll('.posts table');
   const commentDisplays = document.querySelectorAll('.comments');
   const commentTextarea = document.querySelectorAll('.user-comment');
   const commnetsHeight = Number(window.getComputedStyle(commentDisplays[0].firstElementChild.firstElementChild).height.slice(0, length-2));
   commentBtns.forEach((btn, index) => {
    commentDisplays.get
        btn.addEventListener('click', () => {
            btn.classList.toggle('active');
            if(getComputedStyle(commentDisplays[index]).display === 'none'){
                commentDisplays[index].style.display = 'table-row';
                commentTextarea[index].style.display = 'table-row';
                commentDisplays[index].firstElementChild.firstElementChild.style.height = "240px";
                commentTextarea[index].scrollIntoView({block: "end"});
            } else{
                commentDisplays[index].style.display = 'none';
                commentTextarea[index].style.display = 'none';
                posts[index].scrollIntoView({block: "start"});
            }
        });
   });

  
});

