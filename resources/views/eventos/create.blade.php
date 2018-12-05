@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section__header">
        <h1 class="section__title">Solicitar Evento</h1>
    </div>

    <div class="row no-gutters">
        {!! Form::open(['route' => 'evento.store', 'class' => 'col-md-6 col-lg-4', 'files' => true]) !!}

        <div class="col-12">
            <div class="group">
                <p class="w-100 label">Imagen del evento</p>
                <label for="imagen-evento" class="file">
                    <i class="file__icon ion-md-cloud-upload"></i>
                    <input type="file" class="input" name="imagen" id="imagen-evento" accept="image/*" onchange="previewImage(this, 'js-img-preview', 'js-file-text');">
                </label>
                <span class="file__text" id="js-file-text"></span>
            </div>
        </div>

        <div class="col-12">
            {!! Form::inDateTime('fecha_inicio', null, 'Inicio') !!}
        </div>

        <div class="col-12">
            {!! Form::inDateTime('fecha_final', null, 'Final') !!}
        </div>

        <div class="col-12">
            {!! Form::inSelect('tipo', null, 'Tipo de evento', ['exposicion' => 'Exposición', 'convencion' => 'Convención', 'conferencia' => 'Conferencia', 'congreso' => 'Congreso', 'capacitacion' => 'Capacitación', 'comida' => 'Comida']) !!}
        </div>

        <div class="col-12">
            {!! Form::inText('nombre_evento', null, 'Nombre del evento') !!}
        </div>

        <div class="col-12">
            {!! Form::inTextArea('descripcion_evento', null, 'Descripción del evento') !!}
        </div>

        <div class="col-12">
            {!! Form::inNumber('num_invitados', null, 'Capacidad de asistencia') !!}
        </div>

        <div class="col-12">
            {!! Form::inNumber('costo_asociado', null, 'Costo Asociados') !!}
        </div>

        <div class="col-12">
            {!! Form::inNumber('costo_no_asociado', null, 'Costo  No Asociados') !!}
        </div>

        <div class="col-12">
            {!! Form::inTextArea('direccion_evento', null, 'Dirección del evento') !!}
        </div>

        <div class="col-12">
            {!! Form::inText('organizador', null, 'Organizador') !!}
        </div>

        <div class="col-12">
            {!! Form::inEmail('correo_electronico_organizador', null, 'Correo eléctronico del organizador') !!}
        </div>

        <div class="col-12">
            {!! Form::inTel('telefono_organizador', null, 'Teléfono del organizador') !!}
        </div>

        <div class="col-12">
            {!! Form::inText('ponente', null, 'Ponente') !!}
        </div>

        <button type="submit" class="btn btn--accent">
            <i class="btn__icon ion-md-send"></i> Enviar solicitud
        </button>

        {!! Form::close() !!}

        <div class="col-lg-8">
            <img src="/img/defaultEvent.jpg" id="js-img-preview" alt="">
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    @if (Session::has('info'))
        iziToast.success({
            title: '{{ session('info') }}',
            position: "topRight"
        });
    @endif
</script>
@endsection
