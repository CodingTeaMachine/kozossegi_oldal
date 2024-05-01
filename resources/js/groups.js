document.addEventListener('DOMContentLoaded', () => {
    const viewDisplay = document.querySelector('.view');
    const joinDisplay = document.querySelector('.join');
    const displayLinks = document.querySelectorAll('.groups ul li a');
    let viewLink,joinLink;
    
    displayLinks.forEach(link => {
        if(link.getAttribute('href').slice(1) === 'view') viewLink = link;
        if(link.getAttribute('href').slice(1) === 'join') joinLink = link;
    });
    viewLink.addEventListener('click', () => {
        if(viewDisplay.classList.contains('noDisplay')){
            viewLink.classList.add('active');
            joinLink.classList.remove('active');
            viewDisplay.classList.remove('noDisplay');
            joinDisplay.classList.add('noDisplay');
        }
    });
    joinLink.addEventListener('click', () => {
        if(joinDisplay.classList.contains('noDisplay')){
            joinLink.classList.add('active');
            viewLink.classList.remove('active');
            joinDisplay.classList.remove('noDisplay');
            viewDisplay.classList.add('noDisplay');
        }
    });
});