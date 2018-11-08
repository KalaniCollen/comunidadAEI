@extends('layouts.head')
@section('content')
    <div class="section">
        <img src="{{ asset('/storage/catalogos_img/'.$producto->imagen) }}" alt="" width="350px">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $producto->nombre }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <img src="" alt="">
            </div>
            <div class="col-md-5">
                <p><b>Descripción: </b>{{ $producto->descripcion }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <p><b>Costo: </b>$@money($producto->costo)</p>
            </div>
            <div class="col-md-3">
                <p><b>Tipo de Producto: </b>{{ $producto->tipo }}</p>
            </div>
            <div class="col-md-3">
                @if ($producto->descuento > 0)
                    <p><b>Descuento para asociados AEI:</b> {{ $producto->descuento }}%</p>
                @endif
            </div>
        </div>
    </div>
@endsection
