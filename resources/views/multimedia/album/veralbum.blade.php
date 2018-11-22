@extends('layouts.head')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.alertable.css') }}">
    <link href="{{asset('/css/album.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('/css/lightgallery.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('/css/galeria/photoswipe.css')}}">
        <link rel="stylesheet" href="{{asset('/css/galeria/default-skin.css')}}">
@endsection
@section('content')

    <section class="section">
        <div class="section__header">
            <a href="{{ route('album.index') }}" class="btn"><i class="ion-md-arrow-back"></i></a>
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
        <div class="album-images picture three cf" itemscope="" itemtype="http://schema.org/ImageGallery">


            <ul class="album-images__list" id="js-lightgallery">

            @for ($i = 1; $i <= 8; $i++)
                <li class="album-images__item">
                    <figure itemprop="associatedMedia" data="{{$i  }}" itemscope="" itemtype="http://schema.org/ImageObject">
                        <a href="https://fakeimg.pl/350x200/?text=Hello" class="album-images__item" itemprop="contentUrl" data-size="1000x667" style="width: -webkit-fill-available;">
                            <img src="https://fakeimg.pl/350x200/?text=Hello" height="400" width="600" itemprop="thumbnail" alt="">
                        </a>
                    </figure>
          {{-- <img class="album-images__img" src="https://fakeimg.pl/350x200/?text=Hello" alt=""> --}}
                    </li>
                @endfor
            </ul>
        </div>
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true" style="">

    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <div class="pswp__container" style="transform: translate3d(0px, 0px, 0px);">
            <div class="pswp__item" style="display: block; transform: translate3d(-1511px, 0px, 0px);">
							<div class="pswp__zoom-wrap" style="transform: translate3d(240px, 44px, 0px) scale(0.868066);">
							<div class="pswp__img pswp__img--placeholder pswp__img--placeholder--blank" style="width: 1000px; height: 667px; display: none;"></div>
							<img class="pswp__img" src="" style="backface-visibility: hidden;"></div></div>
            <div class="pswp__item" style="transform: translate3d(0px, 0px, 0px);">
							<div class="pswp__zoom-wrap" style="transform: translate3d(240px, 44px, 0px) scale(0.868066);">
								<div class="pswp__img pswp__img--placeholder pswp__img--placeholder--blank" style="width: 1000px; height: 667px; display: none;"></div>
								<img class="pswp__img" src="" style="display: block; backface-visibility: hidden;">
							</div>
						</div>
            <div class="pswp__item" style="display: block; transform: translate3d(1511px, 0px, 0px);"><div class="pswp__zoom-wrap" style="transform: translate3d(240px, 44px, 0px) scale(0.868066);"><div class="pswp__img pswp__img--placeholder pswp__img--placeholder--blank" style="width: 1000px; height: 667px; display: none;"></div><img class="pswp__img" src="" style="backface-visibility: hidden;"></div></div>
        </div>

        <div class="pswp__ui pswp__ui--fit pswp__ui--hidden">

            <div class="pswp__top-bar">

                <div class="pswp__counter"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2/3</font></font></div>

                <button class="pswp__button pswp__button--close" title="Cerrar (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Compartir"></button>
                <button class="pswp__button pswp__button--fs" title="Cambiar a pantalla completa"></button>
                <button class="pswp__button pswp__button--zoom" title="Acercar / alejar"></button>

                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Anterior (flecha izquierda)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Siguiente (flecha derecha)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection
@section('scripts')
    <!-- Fine Uploader Thumbnails template w/ customization
    ==================================================================== -->
    {{-- <script src="{{asset('js/lightgallery-all.min.js')}}"></script> --}}
    <script src="{{ asset('/js/jquery.alertable.js')}}" ></script>
    <script src="{{ asset('js/dropzone.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/galeria/photoswipe.min.js')}}"></script>
    <script src="{{ asset('/js/galeria/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{ asset('/js/galeria/script-min.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function(){
    //     $('#js-lightgallery').lightGallery();
    //     let jsDropzone = $('#js-dropzone');
    //
    //     $('#js-album-upload').on('click', function() {
    //         $('#js-album-add').toggleClass('album-add--hidden');
    //     });

        Dropzone.options.jsDropzone = {
            // paramName: 'file',
            addRemoveLinks: true,
            // autoProcessQueue : false,
            // autoQueue: false,
            acceptedFiles: 'image/*',
            // dictDefaultMessage: '+ Agregar imagenes',
            // dictRemoveFile: 'Eliminar imagen',
            // dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
            maxFilesize: 2, // MB
            init: function() {
                // let submitBtn = document.getElementById('js-send-btn');
                // let jsDrop = this;
                // submitBtn.addEventListener('click', function() {
                //     jsDrop.processQueue();
                // });
            }
        };
    });
    </script>
    {{-- <script src="{{asset('js/uploadalbum.js')}}"></script> --}}
@endsection
