@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">{{ $servicio->nombre }}</h1>
        </div>

        <div class="section__body">
            <div class="row no-gutters">
                <div class="col-md-6 col-lg-6">
                    <img src="{{ asset("storage/catalogos_img/$servicio->imagen") }}" alt="" class="img">
                </div>
                <div class="col-md-5 ml-lg-5 col-lg-5">
                    <div class="mb-3">
                        <h2>Descripción del servicio</h2>
                        <p>{{ $servicio->descripcion }}</p>
                    </div>

                    <div class="mb-3">
                        <h2>Tipo de servicio</h2>
                        <p>{{ $servicio->tipo }}</p>
                    </div>

                    <div class="mb-3">
                        <h2>Horario de atención</h2>
                        <p class="h4">{{ Carbon\Carbon::parse($servicio->horario_inicio)->format('H:i') }} - {{ Carbon\Carbon::parse($servicio->horario_cierre)->format('H:i') }} hrs.</p>
                    </div>

                    @if ($servicio->descuento > 0)
                        <div class="mb-2">
                            <h2>Descuento a socios AEI</h2>
                            <p class="h1">{{ $servicio->descuento }}%</p>
                        </div>
                    @endif
                    <a href="{{ route('servicios.contact', $servicio->slug) }}" class="btn btn--accent mt-3">Contactar</a>
                </div>
            </div>

        </div>

    </section>
@endsection
