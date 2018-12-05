@extends('layouts.app')
@section('content')
    <div class="section">
        <div class="section__header">
            <h1 class="section__title">Resultados de la busqueda</h1>
        </div>

        <div class="section__body">
            @if ($tipo == 0)
                <div class="row ">
                    @foreach ($busqueda as $res)
                        <div class="card">
                            <a href="{{ route('perfil-empresa.show', $res->slug_empresa) }}" class="card__owner">
                                <img src="{{ $res->logo_empresa }}" alt="" class="card__owner-picture">
                                <p class="card__owner-name">{{ $res->nombre_empresa }}</p>
                            </a>
                            <div class="card__body">
                                <p><b>Giro de la empresa:</b> {{ $res->giro_empresa }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row ">
                    @foreach ($busqueda as $res)
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <a href="{{ route(($tipo == 1) ? 'servicios.show' : 'productos.show', $res->slug) }}" class="card__owner">
                                    <img src="{{ $res->empresa->logo_empresa }}" alt="" class="card__owner-picture">
                                    <p class="card__owner-name">{{ $res->empresa->nombre_empresa }}</p>
                                </a>
                                <div class="card__image" style="background-image: url('{{ '/storage/catalogos_img/' .$res->imagen }}');"></div>
                                <div class="card__body">
                                    <p class="card__title">{{ $res->nombre }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection
