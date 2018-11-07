@extends('layouts.head')
@section('content')
<div class="container">
    <h1>Actualizar Servicio</h1>
    <form action="{{ route('servicios.update', $servicio->slug) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        @component('catalogo.servicios.fragments.form', [
            'imagen' => $servicio->imagen,
            'nombre' => $servicio->nombre,
            'descripcion' => $servicio->descripcion,
            'tipo' => $servicio->tipo,
            'descuento' => $servicio->descuento,
            'hora_i' => $servicio->horario_inicio,
            'hora_c' => $servicio->horario_cierre,
            'btnTitle' => 'Actualizar Servicio'
        ])
        @endcomponent
    </form>
</div>
@endsection
