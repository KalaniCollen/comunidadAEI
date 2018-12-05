@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">{{ $producto->nombre }}</h1>
        </div>

        <div class="section__body">
            <div class="row no-gutters">
                <div class="col-md-6 col-lg-6">
                    <img src="{{ asset("storage/catalogos_img/$producto->imagen") }}" alt="" class="img">
                </div>
                <div class="col-md-5 ml-lg-5 col-lg-5">
                    <div class="mb-3">
                        <h2>Descripción del producto</h2>
                        <p>{{ $producto->descripcion }}</p>
                    </div>
                    <div class="mb-3">
                        <h2>Costo del producto</h2>
                        <p class="h4">$@money($producto->costo)</p>
                    </div>
                    <div class="mb-3">
                        <h2>Tipo de producto</h2>
                        <p>{{ $producto->tipo }}</p>
                    </div>
                    @if ($producto->descuento > 0)
                        <div class="mb-2">
                            <h2>Descuento a socios AEI</h2>
                            <p class="h1">{{ $producto->descuento }}%</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </section>
@endsection
