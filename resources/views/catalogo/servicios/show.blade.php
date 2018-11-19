@extends('layouts.head')
@section('content')

    <section class="section">
        <h1 class="section__title">{{ $servicio->nombre }}</h1>
        <img src="{{ asset("storage/catalogos_img/$servicio->imagen") }}" alt="" class="img">

        <p>{{ $servicio->descripcion }}</p>

        <h2>Tipo de servicio</h2>
        <p>{{ $servicio->tipo }}</p>

        <h2>Horario de atención</h2>
        <p>{{ Carbon\Carbon::parse($servicio->horario_inicio)->format('H:i') }} - {{ Carbon\Carbon::parse($servicio->horario_cierre)->format('H:i') }} hrs.</p>

        @if ($servicio->descuento > 0)
            <h2>Descuento a socios AEI</h2>
            <p>{{ $servicio->descuento }}%</p>
        @endif

    </section>
@endsection
