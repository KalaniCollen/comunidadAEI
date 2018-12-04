@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section__header">
            <h1 class="section__title">{{ $album->nombre }}</h1>
            <button class="btn btn--ghost trigger" id="js-album-upload" data-toggle="modal" data-target="#modal-upload">Agregar imagénes</button>
        </div>

        <list-images-album :imagenes="{{ $imagenes }}"></list-images-album>
    </section>
    <div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subir Imagenes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <upload-images-album :album="{{ $album }}"></upload-images-album>
                </div>
            </div>
        </div>
    </div>
@endsection
