<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guias de estilo | AEI</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    {{-- <div class="menu menu--main">
        <div class="menu__brand">
            <div class="brand">
                <img src="http://v.fastcdn.co/t/e9b79025/fd2e429a/1533247864-21926311-168x168-logo-aei-BLANCO.fw.png" alt="" class="brand__logo">
                <p class="brand__title">Comunidad AEI</p>
            </div>
        </div>

        <div class="menu__search">
            <i class="ion-ios-search search__icon"></i>
            <form action="#" class="form form--search-bar">
                <input type="search" name="" id="" class="form__input-input form__input--search-main" placeholder="Buscar...">
            </form>
        </div>

        <div class="menu__wrap {{ Auth::check() ? '' : 'menu--guest' }}">
            <div class="menu__nav">
                <nav class="nav nav--main">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#" class="nav__link">Incio</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('home') }}" class="nav__link">Catálogo</a>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="nav__link">Galería</a>
                        </li>
                    </ul>
                </nav>
            </div>
            @if (Auth::check())
                <div class="menu__user">
                    <div class="user">
                        <img src="https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/012016/untitled-1_77.png?itok=lw7cADiJ" alt="" class="user__picture user__picture--big">
                        <p class="user__username">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="menu__account">
                        <a href="#" class="menu__account-configure">Configurar Cuenta</a>
                        <a href="{{ route('logout') }}" class="menu__account-logout" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Cerrar Sesión</a>
                        <form action="{{ route('logout') }}" method="post" class="form form--logout" id="form-logout">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @else
                <div class="menu__user">
                    <a href="{{ route('login') }}" class="btn btn--accent">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn">Registrarse</a>
                </div>
            @endif
        </div>

        <div class="menu__hamburger">
            <div class="hamburger">
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <section class="section">
                <h1>Asociación de Empresarios de Iztapalapa A.C</h1>
                <img src="https://images.pexels.com/photos/747964/pexels-photo-747964.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                <a href="#" class="btn btn--accent">Iniciar Sesión</a>
                <button class="btn">Registrarse</button>
                <a href="#" class="btn"><i class="ion-ios-alarm btn__icon"></i>Hola</a>
            </section>

            <section class="section">
                <div class="card">
                    <div class="card__owner">
                        <img src="https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/012016/untitled-1_77.png?itok=lw7cADiJ" class="user__picture card-user--picture">
                        <p class="user__username card-user--username">HEINEKEN MÉXICO</p>
                    </div>
                    <div class="card__image">
                        <div style="background-image: url(https://d50xhnwqnrbqk.cloudfront.net/images/products/large/WhatsApp%20Image%202017%2012%2026%20at%2015.36.17.jpeg)" class="card__image-img"></div>
                    </div>
                    <div class="card__body">
                        <p class="card__title">Computadora lenovo x12</p>
                        <p class="card__date">01/Nov/2018</p>
                        <p class="card__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci hic at dolorum similique error suscipit impedit, illo, eaque sit, et nulla ducimus eveniet, qui. Fugit dolorum, debitis saepe maxime sed.</p>
                    </div>
                    <div class="card__actions">
                        <a href="#" class="btn btn--accent">Ver más</a>
                    </div>
                </div>
            </section>

            <section class="section">
                <form action="#" class="form">
                        <div class="form__checkbox">
                            <input type="checkbox" name="" value="" id="check" class="form__checkbox-input">
                            <label for="check" class="form__checkbox-label">Ckeck</label>
                        </div>

                    <div class="form__input">
                        <label for="input-name" class="form__input-label">Nombre</label>
                        <input type="text" name="" value="" id="input-name" class="form__input-input">
                        <span class="form__error">¡El correo que ingreso no existe!</span>
                    </div>

                    <div class="form__input">
                        <label for="passwd" class="form__input-label">Pass</label>
                        <input type="password" name="" value="" id="passwd" class="form__input-input">
                        <span class="form__error"></span>
                    </div>

                    <div class="form__input form__input--material">
                        <input type="text" name="" value="" id="input-nm" class="form__input-input" required>
                        <label for="input-nm" class="form__input-label">Usuario</label>
                        <span class="form__input--material-decoration"></span>
                        <span class="form__error">¡El correo que ingreso no existe!</span>
                    </div>

                    @component('components.in', [
                        'type' => 'text',
                        'name' => 'nombre',
                        'id' => 'in-name',
                        'label' => 'Nombre Full'
                    ])
                    @endcomponent

                    <div class="form__file">
                        <input type="file" name="" id="file" class="form__file-input" onchange="getNameFile(this)">
                        <label for="file" class="btn btn--fab btn--fab-icon"><i class="ion-ios-cloud-upload"></i></label>
                        <span class="form__error"></span>
                    </div>

                    <div class="form__switch">
                        <label for="switch" class="form__switch-label">
                            <input type="checkbox" name="" id="switch" class="form__switch-input">
                            <div class="form__switch-switch"></div>
                            Privado
                        </label>
                    </div>

                    <div class="form__radio">
                        <input type="radio" name="sexo" id="mujer" class="form__radio-input">
                        <label class="form__radio-label" for="mujer">Mujer</label>
                    </div>

                    <div class="form__radio">
                        <input type="radio" name="sexo" id="hombre" class="form__radio-input">
                        <label class="form__radio-label" for="hombre">Hombre</label>
                    </div>
                </form>
            </section>

            <section class="section-form-slider">
                <div class="decoration">
                    <div class="decoration__content">
                        <h2 class="decoration__title">¡Avanza firme a tus metas!</h2>
                        <p class="decoration__text">Jóse M. C.</p>
                    </div>
                </div>
                <form action="#" class="form form--form-slider">

                    <div class="form__input">
                        <label for="input" class="form__input-label">Nombre</label>
                        <input type="text" name="" value="" id="input" class="form__input-input">
                        <span class="form__error">¡El correo que ingreso no existe!</span>
                    </div>

                    <input type="submit" class="btn" value="Enviar">
                </form>
            </section>
        </main>
    </div>

    <div class="modal">

    </div>

    <script type="text/javascript">

        const fileTypes = ["image/jpeg", "image/svg+xml"];
        let iconMenu = document.getElementsByClassName('hamburger');
        iconMenu[0].addEventListener('click', e => {
            iconMenu[0].classList.toggle('hamburger--open');
            document.getElementsByClassName('menu__wrap')[0].classList.toggle('menu__wrap--open');
        });

        function getNameFile(input) {
            if(input.files && input.files[0]) {
                let name = input.files[0].name;
                document.getElementById('file-text').innerHTML = name;
            }
        }
    </script> --}}

    <form class="" action="index.html" method="post">
        @component('components.in',[
            'id' => 'uno',
            'type' => 'checkbox',
            'name' => 'id_usuario',
            'label' => 'Texto'
        ])
        @endcomponent
    </form>
</body>
</html>
