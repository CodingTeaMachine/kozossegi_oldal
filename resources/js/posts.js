document.addEventListener('DOMContentLoaded', () => {
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