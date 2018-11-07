@extends('layouts.head')
@section('content')
    <section class="servicios">
        <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="servicios__form" accept="image/*">
            {{ method_field('POST') }}
            {{ csrf_field() }}
            @component('catalogo.productos.fragments.form', [
                'nombre' => '',
                'costo' => '',
                'descripcion' => '',
                'tipo' => '',
                'descuento' => 0,
                'btnTitle' => 'Publicar Producto'
            ])
            @endcomponent
        </form>
        <div class="card">
            <img src="" alt="" class="upload__img">
        </div>
    </section>
@endsection
