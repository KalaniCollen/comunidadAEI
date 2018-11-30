@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section__header">
        <h1 class="section__title">Solicitar Evento</h1>
    </div>

    <div class="row no-gutters">
        {!! Form::open(['route' => 'evento.store']) !!}
        {!! Form::inDateTime('fecha_inicio', null, 'Inicio') !!}

        {!! Form::inDateTime('fecha_final', null, 'Final') !!}

        {!! Form::inSelect('tipo', null, 'Tipo de evento', ['exposicion' => 'Exposición', 'convencion' => 'Convención', 'conferencia' => 'Conferencia', 'congreso' => 'Congreso', 'capacitacion' => 'Capacitación', 'comida' => 'Comida']) !!}

        {!! Form::inText('nombre_evento', null, 'Nombre del evento') !!}

        {!! Form::inTextArea('descripcion_evento', null, 'Descripción del evento') !!}

        {!! Form::inNumber('num_invitados', null, 'Capacidad de asistencia') !!}

        {!! Form::inNumber('costo_asociado', null, 'Costo Asociados') !!}

        {!! Form::inNumber('costo_no_asociado', null, 'Costo  No Asociados') !!}

        {!! Form::inTextArea('direccion_evento', null, 'Dirección del evento') !!}

        {!! Form::inText('organizador', null, 'Organizador') !!}

        {!! Form::inEmail('correo_electronico_organizador', null, 'Correo eléctronico del organizador') !!}

        {!! Form::inTel('telefono_organizador', null, 'Teléfono del organizador') !!}

        {!! Form::inText('ponente', null, 'Ponente') !!}

        <button type="submit" class="btn btn--accent">
            <i class="btn__icon ion-md-send"></i> Enviar solicitud
        </button>

        {!! Form::close() !!}
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
