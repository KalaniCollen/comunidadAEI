@extends('layouts.head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1>{{ $servicio->nombre }}</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-5">
                <img class="img-fluid" src="{{ asset("storage/catalogos_img/$servicio->imagen") }}" alt="">
            </div>
            <div class="col-md-4 offset-md-1">
                <p>{{ $servicio->descripcion }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><b>Tipo de Servicio:</b> {{ $servicio->tipo }}</p>
            </div>
            <div class="col-md-6">
                <p><b>Horario de atención:</b> {{ Carbon\Carbon::parse($servicio->horario_inicio)->format('H:i') }} - {{ Carbon\Carbon::parse($servicio->horario_cierre)->format('H:i') }} hrs.</p>
            </div>

            @if ($servicio->descuento > 0)
                <p><b>Descuento a socios de AEI: </b>{{ $servicio->descuento }}%</p>
            @endif

        </div>
    </div>
@endsection
