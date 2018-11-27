@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section__header">
        <h1 class="section__title"><i class="ion-md-unlock"></i> Recuperar Contraseña</h1>
    </div>
    <div class="section__body">
        {!! Form::open(['route' => ['password.email'], 'class' => 'col-md-3']) !!}
            {!! Form::inEmail('email', null, 'Correo eléctronico') !!}
            <button type="submit" class="btn btn--ghost"><i class="btn__icon ion-md-send"></i> Recuperar</button>
        {!! Form::close() !!}
    </div>
</section>
@endsection
@section('scripts')
    <script type="text/javascript">
        @if (session('status'))
            iziToast.success({
                title: {{ session('status') }},
                icon: 'ion-md-check'
            });
        @endif
    </script>
@endsection
