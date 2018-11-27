@extends('layouts.app')
@section('content')
    <section class="section">
        <h1>Configuración de la cuenta</h1>
        <form class="card card--configure-account">
            <div class="card__image">
                <img class="card__image-img" src="{{ $user->perfil->imagen }}" alt="">
                {{-- <form action="" class="form"> --}}
                    <div class="form__switch">
                        <label for="privacidad-cuenta" class="form__switch-label">
                            <input type="checkbox" name="" id="privacidad-cuenta" class="form__switch-input" {{ $user->perfil->privacidad == 1 ? 'checked' : '' }}>
                            <div class="form__switch-switch"></div>
                            Perfil público
                        </label>
                    </div>
                {{-- </form> --}}
            </div>
            <div class="card__body">

                <form action="" class="form">
                    {{ csrf_field() }}

                    <div class="group">
                        <label for="nombre">Nombre(s)</label>
                        <input type="text" class="input" name="name" id="nombre" value="{{ $user->name }}">
                    </div>

                    <div class="group">
                        <label for="apaterno">Apellido Paterno</label>
                        <input type="text" class="input" name="apellido_paterno" id="apaterno" value="{{ $user->apellido_paterno }}">
                    </div>

                    <div class="group">
                        <label for="amaterno">Apellido Materno</label>
                        <input type="text" class="input" name="apellido_paterno" id="amaterno" value="{{ $user->apellido_materno }}">
                    </div>

                    <div class="group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="input" name="telefono_movil" id="telefono" value="{{ $user->perfil->telefono_movil }}">
                    </div>


                </form>
                <p><b>Sexo: </b>{{ (strcmp($user->perfil->sexo, 'H') == 0) ? 'Hombre':'Mujer' }}</p>

                <h3>Datos de la cuenta</h3>
                    <div class="group">
                        <label for="">Correo</label>
                        <input type="email" name="email" id="" value="{{ $user->email }}">
                    </div>
                <p><b>Correo: </b> {{ $user->email }}</p>
                <p><b>Contraseña: </b> {{ $user->password }}</p>

                <a href="#" class="link link--accent">Ir a mi empresa</a>
            </div>
        </form>
    </section>
@endsection
