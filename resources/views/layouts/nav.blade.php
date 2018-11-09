<div class="menu menu--main">
    <div class="menu__brand">
        <a class="brand" href="/">
            <img src="/img/logoAEI-blanco.png" alt="" class="brand__logo">
            <p class="brand__title">Comunidad AEI</p>
        </a>
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
                    @if (Auth::check())
                        <li class="nav__item">
                            <a href="/home" class="nav__link">Incio</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('catalogo.index') }}" class="nav__link">Multimedia</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('catalogo.index') }}" class="nav__link">Mi Catálogo</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('catalogo.index') }}" class="nav__link">Mis Logros</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('catalogo.index') }}" class="nav__link">Solicitar Evento</a>
                        </li>
                    @else
                        <li class="nav__item">
                            <a href="/" class="nav__link">Incio</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('home') }}" class="nav__link">Publicaciones</a>
                        </li>
                        <li class="nav__item">
                            <a href="/#quienes-somos" class="nav__link">¿Quiénes Somos?</a>
                        </li>
                        <li class="nav__item">
                            <a href="/#socios" class="nav__link">Nuestros Socios</a>
                        </li>
                        <li class="nav__item">
                            <a href="/#afiliate" class="nav__link">Afiliate</a>
                        </li>
                    @endif
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
