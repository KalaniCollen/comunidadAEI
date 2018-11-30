// document.addEventListener('touchstart', ontouchstart, true);
let iconMenu = document.getElementsByClassName('hamburger');
let account = document.getElementsByClassName('user');
let links = document.getElementsByClassName('nav__link');
let btnSearch = document.getElementById('js-search-btn');
let btnCloseSearch = document.getElementById('js-search-close');
let listSearch = document.getElementById('js-search-list');

iconMenu[0].addEventListener('click', e => {
    iconMenu[0].classList.toggle('hamburger--open');
    document.getElementsByClassName('menu__wrap')[0].classList.toggle('menu__wrap--open');
});

function previewImage(input, img, text) {
    if(input.files && input.files[0]) {
        // DEBUG:
        document.getElementById(text).innerHTML =  input.files[0].name;
        let reader = new FileReader();
        reader.onload = function(el) {
            document.getElementById(img).src = el.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewImageOnlyText(input, text) {
    if(input.files && input.files[0]) {
        document.getElementById(text).innerHTML =  input.files[0].name;
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
    element.lastChild.classList.toggle('submenu--open');
}

/*
 * Funciones GLOBALES
 */
// Función para usar ajax
function ajaxData(url = '', type = 'POST', token = '' , data = {}, func) {
    $.ajax(url, {
        headers: { 'X-CSRF-TOKEN': token },
        type: type,
        dataType: 'json',
        data: data,
        success: func()
    });
}


function deleteItem(form) {
    event.preventDefault();
    if (confirm("¿Seguro que desdea eliminar este item?")) {
        form.submit();
    } else {
        return;
    }
}
