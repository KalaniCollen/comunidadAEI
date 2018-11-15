@extends('layouts.head')
@section('content')
    <section class="section">
        <h1>Agregar Servicio</h1>
        {{-- <form action="{{ route('servicios.store') }}" method="post" enctype="multipart/form-data" class="form">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            @component('catalogo.servicios.fragments.form', [
                'nombre' => '',
                'descripcion' => '',
                'tipo' => '',
                'descuento' => 0,
                'hora_i' => '00:00',
                'hora_c' => '00:00',
                'btnTitle' => 'Agregar Servicio'
            ])
            @endcomponent
        </form> --}}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif


        {!! Form::open(['route' => ['servicios.store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="group">
                {!! Form::label('nombre', 'Nombre', ['class' => 'label']) !!}
                {!! Form::text('nombre', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('descripcion', 'Descripción', ['class' => 'label']) !!}
                {!! Form::textarea('descripcion', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('tipo', 'Tipo de servicio', ['class' => 'label']) !!}
                {!! Form::text('tipo', null, ['class' => 'input']) !!}
            </div>

            <div class="group">
                {!! Form::label('descuento', 'Descuento a socios', ['class' => 'label']) !!}
                {!! Form::number('descuento', 0, ['class' => 'input', 'min' => 0, 'max' => '100']) !!}
            </div>

            <div class="group">
                {!! Form::label('', 'Horario de atención', ['class' => 'label']) !!}
                {!! Form::time('horario_inicio', '00:00', ['class' => 'input']) !!}
                {!! Form::time('horario_cierre', '00:00', ['class' => 'input']) !!}
            </div>


            {!! Form::submit('Agregar servicio', ['class' => 'btn btn--accent']) !!}


        {!! Form::close() !!}


        <img src="{{ asset('storage/catalogos_img/defaultProduct.jpg') }}" alt="" id="js-img-preview">
    </section>
@endsection
{{-- @section('scripts')
    {{-- <script type="text/javascript">
        let btnUpload = document.getElementById('imagen-upload');
        btnUpload.addEventListener('change', e => {
            if(btnUpload.files && btnUpload.files[0]) {
                console.log(btnUpload.files[0].name);
                let reader = new FileReader();
                reader.onload = function(el) {
                    document.getElementById('preview-img').src = el.target.result;
                };
                reader.readAsDataURL(btnUpload.files[0]);
            }
        });
    </script>
@endsection --}}
