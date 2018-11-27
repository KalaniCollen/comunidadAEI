@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">{{ $album->nombre }}</h1>
            <button class="btn btn--ghost trigger" id="js-album-upload">Agregar imagénes</button>
        </div>
        <upload-images-album :album="{{ $album }}"></upload-images-album>
        <images-album :imagenes="{{ $imagenes }}"></images-album>
    </section>
@endsection
