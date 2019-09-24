'use-strict';
const toggleNav = (btn, sideNav) => {
    if (btn.classList.contains('close')){
        sideNav.style.width = '0px';
    }else {
        sideNav.style.width = '250px';
        // document.body.style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
    }
}

const sideNav = document.querySelector('.dropdown');
const toggleBtn = document.querySelectorAll('.toggle--icon');
toggleBtn.forEach(el => el.addEventListener('click', () => {
    toggleNav(el, sideNav)
}))