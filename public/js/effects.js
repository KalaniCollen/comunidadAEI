let iconMenu = document.getElementsByClassName('hamburger');
let account = document.getElementsByClassName('user');
let links = document.getElementsByClassName('nav__link');


iconMenu[0].addEventListener('click', e => {
    iconMenu[0].classList.toggle('hamburger--open');
    document.getElementsByClassName('menu__wrap')[0].classList.toggle('menu__wrap--open');
});

account[0].addEventListener('click', e => {
    document.getElementsByClassName('menu__account')[0].classList.toggle('menu__account--open');
});

[].forEach.call(links, function(link) {
    link.addEventListener('click', e => {
        iconMenu[0].classList.toggle('hamburger--open');
        document.getElementsByClassName('menu__wrap')[0].classList.toggle('menu__wrap--open');
    });
});
