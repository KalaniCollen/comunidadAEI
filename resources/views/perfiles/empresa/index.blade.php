@extends('layouts.head')
@section('content')
    <div class="card">
        <a href="">Contacto</a>
        <a href="#" class="btn">Editar</a>

        <div class="card__image">
            <img src="{{ $perfilE->logo_empresa }}" alt="Logotipo de la empresa {{ $perfilE->nombre_empresa }}">
        </div>
    </div>
@endsection
