@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">{{ $servicio->nombre }}</h1>
        </div>

        <div class="section__body">
            <div class="row no-gutters">
                <div class="col-md-6 col-lg-5">
                    <img src="{{ asset("storage/catalogos_img/$servicio->imagen") }}" alt="" class="img">
                </div>
                <div class="col-md-5 offset-1 col-lg-5">
                    <h2>Descripción del servicio</h2>
                    <p>{{ $servicio->descripcion }}</p>
                    <br>
                    <h2>Tipo de servicio</h2>
                    <p>{{ $servicio->tipo }}</p>
                    <br>
                    <h2>Horario de atención</h2>
                    <p>{{ Carbon\Carbon::parse($servicio->horario_inicio)->format('H:i') }} - {{ Carbon\Carbon::parse($servicio->horario_cierre)->format('H:i') }} hrs.</p>
                    <br>
                    @if ($servicio->descuento > 0)
                        <h2>Descuento a socios AEI</h2>
                        <p>{{ $servicio->descuento }}%</p>
                    @endif
                    <a href="{{ route('servicios.contact', $servicio->slug) }}" class="btn btn--accent">Contactar</a>
                </div>
            </div>

        </div>





    </section>
@endsection
