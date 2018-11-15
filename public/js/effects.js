let iconMenu = document.getElementsByClassName('hamburger');
let account = document.getElementsByClassName('user');
let links = document.getElementsByClassName('nav__link');
let btnSearch = document.getElementById('js-search-btn');
let btnCloseSearch = document.getElementById('js-search-close');

iconMenu[0].addEventListener('click', e => {
    iconMenu[0].classList.toggle('hamburger--open');
    document.getElementsByClassName('menu__wrap')[0].classList.toggle('menu__wrap--open');
});

// if (account[0] != undefined) {
//     account[0].addEventListener('click', function(e) {
//         document.getElementsByClassName('account')[0].classList.toggle('account--open');
//     });
// }

[].forEach.call(links, function(link) {
    link.addEventListener('click', e => {
        iconMenu[0].classList.toggle('hamburger--open');
        document.getElementsByClassName('menu__wrap')[0].classList.toggle('menu__wrap--open');
    });
});

function previewImage(input, img) {
    if(input.files && input.files[0]) {
        // DEBUG:
        console.log(input.files[0].name);
        let reader = new FileReader();
        reader.onload = function(el) {
            document.getElementById(img).src = el.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewImages(input) {
    if(input.files && input.files[0]) {
        // DEBUG:
        // console.log(input.files[0].name);
        let reader = new FileReader();
        reader.onload = function(el) {
            return el.target.result;
        };
        // return reader.readAsDataURL(input.files[0]);
    }
}

// Acordeon del footer
let btns = document.getElementsByClassName('footer__title');
[].forEach.call(btns , function(btn) {
    btn.addEventListener('click', e=> {
        btn.childNodes[2].classList.toggle('ion-md-remove'); // Cambiar icono al hacer click
        btn.nextElementSibling.classList.toggle('footer__list--show'); // Mostrar contenido
    });
});

btnSearch.addEventListener('click', e => {
    document.getElementById('js-search-form').classList.add('menu__form-search--open');
});

btnCloseSearch.addEventListener('click', e =>  {
    document.getElementById('js-search-input').value = '';
    document.getElementById('js-search-form').classList.remove('menu__form-search--open');
});

function submenu(element) {
    event.preventDefault();
    element.lastChild.classList.toggle('submenu--open');
}
