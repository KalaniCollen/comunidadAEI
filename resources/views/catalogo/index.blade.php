@extends('layouts.head')
@section('content')
    <main class="main__catalogo">
        {{-- <aside class="aside__search">
            <h4>Filtros Avanzados</h4>
            <div class="form__input">
                <label for="buscar">Buscar</label>
                <input type="search" name="buscador" id="buscar" class="form__input-input">
            </div>
            <button class="btn btn--primary"><i class="icon ion-md-search"></i>Buscar</button>
        </aside> --}}
            <h1>Mi Catálogo</h1>
            <a href="{{ route('productos.create') }}" class="btn btn-outline-secondary">Publicar Producto</a>
            <a href="{{ route('servicios.create') }}" class="btn btn-outline-secondary">Publicar Servicio</a>
            @if (!$productos->isEmpty())
                <div class="section section--cards">
                    @foreach ($productos as $producto)
                        <div class="col-md-6 col-lg-4 mt-2 mb-5">
                            @component('catalogo.components.card', [
                                'userimg'     => 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                                'username'    => $producto->user->name,
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
                            <form id="delete-product" action="{{ route('productos.destroy', [$producto->slug]) }}" method="post" style="display: inline-block;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="submit" class="link" value="Eliminar">
                            </form>
                        @endcomponent
                    </div>
                @endforeach
            </div>
        @endif
        @if (!$servicios->isEmpty())
            <h2>Servicios</h2>
            <div class="section section--cards">
                @foreach ($servicios as $servicio)
                    @component('catalogo.components.card', [
                        'userimg'     => 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&h=650&w=940',
                        'username'    => $servicio->user->name,
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

                    <form id="delete-service" action="{{ route('servicios.destroy', [$servicio->slug]) }}" method="post" style="display: inline-block;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="link" value="Eliminar">
                    </form>
                @endcomponent
            @endforeach
        </div>
    @endif

</main>
@endsection
