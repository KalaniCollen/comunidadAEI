@extends('layouts.html')
@section('content')
    <section class="section login">
        <div class="card card--login">

            <div class="login__header">
                <h1 class="h2 text--center">Iniciar Sesión</h1>
                <img src="{{ asset('img/logoAEI-azul.png') }}" alt="" class="login__logo">
                <h2 class="h4 text--center">Asociación de Empresarios de Iztapalapa A.C.</h2>
            </div>

            {!! Form::open(['class' => 'login__form']) !!}
                {!! Form::inEmail('email', null, 'Correo eléctronico', 'group--material group--material-icon', [], 'mail') !!}

                <div class="group group--material group--material-icon">
                    {!! Form::label('password', 'Contraseña', ['class' => 'label']) !!}
                    <i class="input__icon ion-md-key"></i>
                    {!! Form::password('password', ['class' => 'input']) !!}
                    <span class="input__decoration {{ ($errors->has('password') == 1) ? 'input__decoration--error' : '' }}"></span>
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
                <a href="{{ route('password.request') }}" class="login__link link text--left">¿Olvidó su contraseña?</a>

                {!! Form::inCheck('remember', 'remember', true, 'Mantener sesión abierta') !!}

                <button class="btn btn--accent"><i class="btn__icon ion-md-send"></i> Iniciar Sesión</button>

                <p class="login__link ">¿Aún no tiene una cuenta? <a href="{{ route('register') }}" class="link link--accent">Registrese</a></p>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">

        @if (Session::has('info'))
        iziToast.success({
            title: '{{ session('info') }}',
            position: "bottomRight"
        });
        @endif

    </script>
@endsection
