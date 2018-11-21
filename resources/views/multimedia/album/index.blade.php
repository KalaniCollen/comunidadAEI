@extends('layouts.head')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.alertable.css') }}">
@endsection
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">Albums</h1>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="js-album-token">
            <button class="btn btn--accent" id="js-album-new"><i class="btn__icon ion-md-add"></i>Agregar album</button>
        </div>
        <section class="section section--cards">
            @isset($albums)
                @foreach ($albums as $album)
                    <div class="card card--album">
                        <h1 class="card__title">{{ $album->nombre }}</h1>
                        <a href="{{ route('album.show', $album->slug_album) }}">
                            <img src="{{ asset('img/download.png') }}" class="article-img" alt="">
                        </a>
                        <div>
                            <button class="btn js-album-edit" data-token="{{ csrf_token() }}" data-slug="{{ $album->slug_album }}"><i class="btn__icon ion-md-create"></i> Editar</button>
                            <button class="btn js-album-delete" data-token="{{ csrf_token() }}" data-slug="{{ $album->slug_album }}" data-name="{{ $album->nombre }}"><i class="btn__icon ion-md-trash"></i> Eliminar</button>
                        </div>
                    </div>
                @endforeach
            @endisset
        </section>
    </section>
@endsection
@section('scripts')
<script src="{{ asset('/js/jquery.alertable.js')}}" ></script>
<script src="{{ asset('/js/Album.js')}}" ></script>
@endsection
