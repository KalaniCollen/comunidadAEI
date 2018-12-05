@extends('layouts.app')
@section('content')
    <main class="main__catalogo">
        <section class="section">
            <div class="section__header">
                <h1 class="section__title">Mi Catálogo</h1>
                <div class="section__options">
                    @isset($productos)
                        <a href="{{ route('productos.create') }}" class="btn btn-outline-secondary">Publicar Producto</a>
                    @endisset
                    @isset($servicios)
                        <a href="{{ route('servicios.create') }}" class="btn btn-outline-secondary">Publicar Servicio</a>
                    @endisset
                </div>
            </div>

            <!-- Variable de inicio  -->
            @isset($configure)
                {!! $configure !!}
            @endisset
            <div class="section__body">
                <div class="row no-gutters">
                    @isset($productos)
                        @if(count($productos) != 0)
                            <div class="col-12">
                                <h2>Productos</h2>
                            </div>
                        @endif
                        @foreach ($productos as $producto)
                            <div class="col-md-5 mr-md-4 ml-md-5 col-lg-3 mr-lg-3 ml-lg-3">
                                @component('components.card', [
                                    'url'         => route('perfil-empresa.show', $producto->empresa->slug_empresa),
                                    'picture'     => $producto->empresa->logo_empresa,
                                    'name'        => $producto->empresa->nombre_empresa,
                                    'image'       => asset('/storage/catalogos_img/' . $producto->imagen),
                                    'title'       => $producto->nombre,
                                    'date'        => $producto->created_at,
                                    'description' => $producto->descripcion,
                                ])
                                    <a href="/productos/{{ $producto->slug }}" class="btn btn--ghost btn--ghost-transparent">Ver Más</a>
                                    <a href="/productos/{{ $producto->slug }}/edit" class="btn btn--ghost btn--ghost-transparent">Actualizar</a>
                                    <form id="delete-product" action="{{ route('productos.destroy', [$producto->slug]) }}" method="post" style="display: inline-block;" onsubmit="deleteItem(this);">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn--ghost btn--ghost-transparent" value="Eliminar">
                                    </form>
                                @endcomponent
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="row no-gutters">
                    @isset($servicios)
                        @if(count($servicios) != 0)
                            <div class="col-12">
                                <h2>Servicios</h2>
                            </div>
                        @endif
                        @foreach ($servicios as $servicio)
                            <div class="col-md-5 mr-md-4 ml-md-5 col-lg-3 mr-lg-3 ml-lg-3">
                                @component('components.card', [
                                    'url'        => route('perfil-empresa.show', $servicio->empresa->slug_empresa),
                                    'picture'    => $servicio->empresa->logo_empresa,
                                    'name'       => $servicio->empresa->nombre_empresa,
                                    'image'      => asset('/storage/catalogos_img/' . $servicio->imagen),
                                    'title'      => $servicio->nombre,
                                    'date'       => $servicio->created_at,
                                    'description'=> $servicio->descripcion,
                                ])

                                    <a href="{{ route('servicios.show', [$servicio->slug]) }}" class="btn btn--ghost btn--ghost-transparent">Ver Más</a>

                                    <a href="{{ route('servicios.edit', [$servicio->slug]) }}" class="btn btn--ghost btn--ghost-transparent">Actualizar</a>

                                    <form id="delete-service" action="{{ route('servicios.destroy', [$servicio->slug]) }}" method="post" style="display: inline-block;"  onsubmit="deleteItem(this);">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn--ghost btn--ghost-transparent" value="Eliminar">
                                    </form>
                                @endcomponent
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
    </section>
</main>
@endsection
