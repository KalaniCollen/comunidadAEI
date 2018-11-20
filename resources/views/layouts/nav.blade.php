<div class="menu menu--main">
    <div class="menu__form-search" id="js-search-form">
        {!! Form::open(['route' => ['search.search'], 'method' => 'post','class' => 'form__search-form']) !!}
        <button type="submit" name="buscar" class="form__search-btn">
            <i class="ion-ios-search" id="js-search"></i>
        </button>
        <input type="search" name="buscar" id="js-search-input" class="form__search-input" placeholder="Buscar..." autofocus>
        <i class="form__search-icon ion-ios-close" id="js-search-close"></i>
        {!! Form::close() !!}
    </div>
    <div class="menu__brand">
        <a class="brand" href="/">
            <img src="/img/logoAEI-blanco.png" alt="" class="brand__logo">
            <p class="brand__title">Comunidad AEI</p>
        </a>
    </div>

    <div class="menu__search">
        <i class="ion-ios-search search__icon" id="js-search-btn"></i>
    </div>

    <div class="menu__wrap {{ Auth::check() ? '' : 'menu--guest' }}">
        <div class="menu__nav">
            <nav class="nav nav--main">
                <ul class="nav__list">
                    @if (Auth::check())
                        @php
                            $links = [
                                ['link' => 'home', 'name' => 'Inicio'],
                                ['link' => 'catalogo.index', 'name' => 'Mi Catálogo'],
                                ['link' => '/', 'name' => 'Calendario'],
                                ['link' => '/', 'name' => 'Solicitar Evento'],
                            ];
                        @endphp
                        @each('components.item-menu', $links, 'link')
                        <li class="nav__item" onclick="submenu(this)">
                            <p class="nav__link">Multimedia</p>
                            <ul class="submenu">
                                <li class="submenu__item">
                                    <a href="{{ route('album.index') }}" class="submenu__link"><i class="account__icon ion-ios-camera"></i>Galería</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="{{ route('videos.index') }}" class="submenu__link"><i class="account__icon ion-ios-videocam"></i>Videos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item nav__item--active" onclick="submenu(this)">
                            <div class="user">
                                <img src="{{ Auth::user()->perfil->imagen }}" alt="" class="user__picture user__picture--big">
                                <p class="user__username">{{ Auth::user()->name }}</p>
                            </div>
                            <ul class="submenu">
                                <li class="submenu__item">
                                    <a href="{{ route('perfil-usuario.index') }}" class="submenu__link"><i class="account__icon ion-ios-settings"></i>Mi Cuenta</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="{{ route('perfil-empresa.index') }}" class="submenu__link"><i class="account__icon ion-ios-business"></i>Mi Empresa</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="{{ route('logout') }}" class="submenu__link" onclick="event.preventDefault();document.getElementById('form-logout').submit();"><i class="account__icon ion-ios-log-out"></i>Cerrar Sesión</a>
                                    <form action="{{ route('logout') }}" method="post" style="display: none;" id="form-logout">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        @php
                            $links = [
                                ['link' => '/', 'name' => 'Inicio'],
                                ['link' => '/', 'name' => '¿Quienes Somos?'],
                                ['link' => '/', 'name' => 'Nuestros Socios'],
                                ['link' => '/', 'name' => 'Contactanos'],
                                ['link' => 'home', 'name' => 'Publicaciones'],
                                ['link' => '/', 'name' => 'Calendario'],
                            ];
                        @endphp
                        @each('components.item-menu', $links, 'link')
                        <li class="nav__item">
                            <a href="{{ route('login') }}" class="btn btn--accent">Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="btn">Registrarse</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    <div class="menu__hamburger">
        <div class="hamburger">
            <span class="hamburger__bar"></span>
            <span class="hamburger__bar"></span>
            <span class="hamburger__bar"></span>
        </div>
    </div>
</div>
