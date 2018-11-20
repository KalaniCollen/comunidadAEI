@extends('layouts.head')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.alertable.css') }}">
    <link href="{{asset('/css/album.css')}}" rel="stylesheet">
    <link href="{{asset('/css/lightgallery.css')}}" rel="stylesheet">

@endsection
@section('content')

    <section class="section">
        <div class="section__header">
            <h1 class="section__title">{{ $album->nombre }}</h1>
            <button class="btn" id="js-album-upload">Subir Imagénes</button>
        </div>
        <div class="album-add album-add--hidden" id="js-album-add">
            {!! Form::open(['route' => ['album.add-image', $album->slug_album], 'method' => 'POST', 'files' => true, 'class' => 'dropzone album-add__form', 'id' => 'js-dropzone', 'enctype' => 'multipart/form-data']) !!}
            <div class="fallback">
                {!! Form::file('imagen', ['class' => 'input', 'accept' => 'image/*']) !!}
            </div>
            {!! Form::close() !!}

            <button class="btn btn--accent album-add__btn" id="js-send-btn">
                <i class="btn__icon ion-md-send"></i>
                Subir Imagénes
            </button>
        </div>
        <div class="album-images">
            <ul class="album-images__list" id="js-lightgallery js-masonry">
            @for ($i = 1; $i <= 8; $i++)
                    <li class="album-images__item" data-src="https://fakeimg.pl/350x200/?text=Hello">
                        <img class="album-images__img" src="https://fakeimg.pl/350x200/?text=Hello" alt="">
                    </li>
                @endfor
            </ul>
        </div>
</section>
@endsection
@section('scripts')
    <!-- Fine Uploader Thumbnails template w/ customization
    ==================================================================== -->
    <script src="{{asset('js/lightgallery-all.min.js')}}"></script>
    <script src="{{ asset('/js/jquery.alertable.js')}}" ></script>
    <script src="{{ asset('js/dropzone.js') }}" charset="utf-8"></script>


    <script type="text/javascript">
    $(document).ready(function(){
        $('#js-lightgallery').lightGallery();
        let jsDropzone = $('#js-dropzone');

        $('#js-album-upload').on('click', function() {
            $('#js-album-add').toggleClass('album-add--hidden');
        });

        Dropzone.options.jsDropzone = {
            paramName: 'file',
            addRemoveLinks: true,
            autoProcessQueue : false,
            acceptedFiles: 'image/*',
            dictDefaultMessage: '+ Agregar imagenes',
            dictRemoveFile: 'Eliminar imagen',
            dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
            maxFilesize: 2, // MB
            init: function() {
                let submitBtn = document.getElementById('js-send-btn');
                let jsDrop = this;
                submitBtn.addEventListener('click', function() {
                    jsDrop.processQueue();
                });
            }
        };
    });
    </script>
    <script src="{{asset('js/uploadalbum.js')}}"></script>
@endsection
