@extends('layouts.head')
@section('content')
    <main class="main__catalogo">
        <section class="section">
            <div class="section__header">
                <h1 class="section__title">Mi Catálogo</h1>
                <div class="section__options">
                    <a href="{{ route('productos.create') }}" class="btn btn-outline-secondary">Publicar Producto</a>
                    <a href="{{ route('servicios.create') }}" class="btn btn-outline-secondary">Publicar Servicio</a>
                </div>
            </div>

            @isset($productos)
                <h2>Productos</h2>
                <div class="section section--cards">
                    @foreach ($productos as $producto)
                        @component('catalogo.components.card', [
                            'userimg'     => $producto->empresa->logo_empresa,
                            'username'    => $producto->empresa->nombre_empresa,
                            'img'         => $producto->imagen,
                            'title'       => $producto->nombre,
                            'date'        => $producto->created_at,
                            'description' => $producto->descripcion,
                        ])
                        @slot('data')
                            Costo: <b>$@money($producto->costo)</b>
                        @endslot

                        <a href="/productos/{{ $producto->slug }}" class="link">Ver Más</a>
                        <a href="/productos/{{ $producto->slug }}/edit" class="link">Actualizar</a>
                        <form id="delete-product" action="{{ route('productos.destroy', [$producto->slug]) }}" method="post" style="display: inline-block;" onsubmit="deleteItem(this);">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" class="link" value="Eliminar">
                        </form>
                    @endcomponent
                @endforeach
            </div>
            @endisset
            @isset($servicios)
                <h2>Servicios</h2>
                <div class="section section--cards">
                    @foreach ($servicios as $servicio)
                        @component('catalogo.components.card', [
                            'userimg'     => $servicio->empresa->logo_empresa,
                            'username'    => $servicio->empresa->nombre_empresa,
                            'img'         => $servicio->imagen,
                            'title'       => $servicio->nombre,
                            'date'        => $servicio->created_at,
                            'description' => $servicio->descripcion,
                        ])
                        @slot('data')
                            Horario de atención: <b>
                                {{ Carbon\Carbon::parse($servicio->horario_inicio)->format('H:i') }} a
                                {{ Carbon\Carbon::parse($servicio->horario_cierre)->format('H:i') }} hrs.
                            </b>
                        @endslot

                            <a href="{{ route('servicios.show', [$servicio->slug]) }}" class="link">Ver Más</a>

                            <a href="{{ route('servicios.edit', [$servicio->slug]) }}" class="link">Actualizar</a>

                            <form id="delete-service" action="{{ route('servicios.destroy', [$servicio->slug]) }}" method="post" style="display: inline-block;"  onsubmit="deleteItem(this);">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="submit" class="link" value="Eliminar">
                            </form>
                        @endcomponent
                    @endforeach
                </div>
            @endisset
    </section>
</main>
@endsection
