<div class="menu menu--main">
    <div class="menu__form-search" id="js-search-form">
        {!! Form::open(['route' => ['search.search'], 'method' => 'post','class' => 'form__search-form']) !!}
        <button type="submit" name="buscar" class="form__search-btn">
            <i class="ion-ios-search" id="js-search"></i>
        </button>
        <input type="search" name="buscar" id="js-search-input" class="input" placeholder="Buscar..." autofocus>

        {!! Form::select('topic', ['empresa' => 'Empresa', 'servicio' => 'Servicio', 'producto' => 'Producto'], null, ['class' => 'input']) !!}

        <i class="form__search-icon ion-ios-close" id="js-search-close"></i>
        {!! Form::close() !!}
    </div>
    <div class="menu__brand">
        <a class="brand" href="/">
            <img src="/img/logoAEI-blanco.png" alt="" class="brand__logo">
            <p class="brand__title">{{ config('app.name') }}</p>
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
                                ['link' => '/', 'name' => 'Catálogos'],
                                ['link' => 'catalogo.index', 'name' => 'Mi Catálogo'],
                                ['link' => 'calendario', 'name' => 'Calendario'],
                                ['link' => 'evento.create', 'name' => 'Solicitar Evento'],
                            ];
                        @endphp
                        @each('components.item-menu', $links, 'link')
                        <div class="nav__item dropdown">
                            <a href="#" class="dropdown-toggle nav__link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Multimedia</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li class="submenu__item">
                                    <a href="{{ route('albums.view') }}" class="submenu__link"><i class="account__icon ion-md-camera"></i>Galería</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="{{ route('videos.index') }}" class="submenu__link"><i class="account__icon ion-md-videocam"></i>Videos</a>
                                </li>
                            </ul>
                        </div>
                        <li class="nav__item dropdown">
                            <div class="user dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                                <img src="{{ auth()->user()->perfil->imagen }}" alt="" class="user__picture user__picture--big" >
                                <p class="user__username">{{ auth()->user()->name }}</p>
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li class="submenu__item">
                                    <a href="{{ route('perfil-usuario.index') }}" class="submenu__link"><i class="account__icon ion-md-person"></i>Mi Cuenta</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="{{ route('perfil-empresa.index') }}" class="submenu__link"><i class="account__icon ion-md-business"></i>Mi Empresa</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="{{ route('logout') }}" class="submenu__link" onclick="event.preventDefault();document.getElementById('form-logout').submit();"><i class="account__icon ion-md-log-out"></i>Cerrar Sesión</a>
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
                                ['link' => '/#quienes-somos', 'name' => '¿Quienes Somos?'],
                                ['link' => '/#nuestos-socios', 'name' => 'Nuestros Socios'],
                                ['link' => '/#afiliate', 'name' => 'Contactanos'],
                                ['link' => '/home', 'name' => 'Publicaciones'],
                                ['link' => 'calendario', 'name' => 'Calendario'],
                            ];
                        @endphp
                        @foreach ($links as $link)
                            <li class="nav__item">
                                <a href="{{ $link['link'] }}" class="nav__link">{{ $link['name'] }}</a>
                            </li>
                        @endforeach
                        <li class="nav__item">
                            <a href="{{ route('login') }}" class="btn btn--accent nav__link">Iniciar Sesión</a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('register') }}" class="btn nav__link">Registrarse</a>
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
