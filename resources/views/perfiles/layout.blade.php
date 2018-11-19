<section class="section">
    <h1 class="section__title">Mi Perfil</h1>

    <div class="profile">
        <img src="{{ $perfil->imagen }}" alt="" >
        <h2>Nombre</h2>
        <p class="h4">{{ Auth::user()->name }}</p>

        <h2>Apellido Paterno</h2>
        <p class="h4">{{ Auth::user()->apellido_paterno }}</p>

        <h2>Apellido Materno</h2>
        <p class="h4">{{ Auth::user()->apellido_materno }}</p>

        @isset ($perfil->fecha_nacimiento)
            <h2>Fecha de Nacimiento</h2>
            <p class="h4"><i class="ion-md-calendar"></i> {{ $perfil->fecha_nacimiento }}</p>
        @endisset

        @isset ($perfil->sexo)
            <h2>Sexo</h2>
            <p class="h4"><i class="ion-md-{{ (strcmp($perfil->sexo, 'H') == 0) ? 'male' : 'female' }}"></i> {{ (strcmp($perfil->sexo, 'H') == 0) ? 'Hombre' : 'Mujer' }}</p>
        @endisset

        @isset ($perfil->telefono_movil)
            <h2>Teléfono</h2>
            <p class="h4"><i class="ion-md-call"></i> {{ $perfil->telefono_movil }}</p>
        @endisset
        @isset (Auth::user()->email)
            <h2>Correo</h2>
            <p class="h4"><i class="ion-md-mail"></i> {{ Auth::user()->email }}</p>
        @endisset
        @isset($perfil->red_social)
            <h2>Redes Sociales</h2>
            <a href="#" class="h4"><i class="ion-logo-facebook"></i> {{ $perfil->red_social }}</a>
        @endisset
    </div>

</section>
