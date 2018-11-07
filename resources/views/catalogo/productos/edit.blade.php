@extends('layouts.head')
@section('content')
    <section class="servicios">
        <form action="{{ route('productos.update', $producto->slug) }}" method="post" enctype="multipart/form-data" class="servicios__form" accept="image/*">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            @component('catalogo.productos.fragments.form', [
                'imagen' => $producto->imagen,
                'nombre' => $producto->nombre,
                'costo' => $producto->costo,
                'descripcion' => $producto->descripcion,
                'tipo' => $producto->tipo,
                'descuento' => $producto->descuento,
                'btnTitle' => 'Actualizar Producto'
            ])
            @endcomponent
        </form>

        <div class="card">
            <img src="{{ asset( 'storage/catalogos_img/' . $producto->imagen) }}" alt="">
        </div>
    </section>
@endsection
