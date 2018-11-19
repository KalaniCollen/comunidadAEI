@extends('layouts.head')
@section('styles')
    <link href="{{asset('/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('/galeria/fine-uploader-gallery.css')}}" rel="stylesheet">
    <link href="{{asset('/css/album.css')}}" rel="stylesheet">
    <link href="{{asset('/css/lightgallery.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}" />


@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $Album->nombre}}</div>
                    <div class="panel-body">
                        @include('multimedia.album.subir')
                        <br >
                        @if(!empty ($Galeria))


                            <div class="demo-gallery " id="galeria">
                                <ul id="lightgallery" class="list-unstyled row">
                                    @foreach ($Galeria as $key => $Galeria)
                                        {{-- {{$Galeria->direccion  }} --}}
                                        <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{$Galeria->direccion  }} 375,  {{$Galeria->direccion  }} 480, {{$Galeria->direccion  }} 800" data-src="{{$Galeria->direccion  }}" data-sub-html='{{ $Galeria->id_imagen }}' >
                                            <a href="">
                                                <img class="img-responsive" src="{{$Galeria->direccion  }}" height="20px">
                                                <div class="demo-gallery-poster">
                                                    <img class="demo-gallery-poster" src="../img/zoom.png">
                                                </div>
                                            </a>
                                        </li>
                                        {{-- <img  src="{{$Galeria->direccion  }}" alt=" " width="100px" height="100px" /> --}}
                                    @endforeach
                                </ul>

                            </div>

                            @include('Modal.Confirmacion',array('multimedia' => 'La imagen'))
                        @else
                            @if(empty ($Galeria))
                                No hay imagenes
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Modal.Confirmacion0')
@endsection
@section('scripts')
    <!-- Fine Uploader Thumbnails template w/ customization
    ====================================================================== -->
    <script>
    var url="{{ asset('') }}";
    var album="{{ $Album->slug_album  }}";
    var imagen;
    var $lg=$('#lightgallery');
    </script>
    <script src="{{asset('js/jquery.fine-uploader.js')}}"></script>
    <script src="{{asset('js/jquery.fine-uploader.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script src="{{asset('js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
    <script type="text/template" id="qq-template-manual-trigger">
        <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button">
                    <div>Agregar</div>
                </div>
                <button type="button" id="trigger-upload" class="btn btn-primary">
                    <i class="icon-upload icon-white"></i> Subir
                </button>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Procesando imagenes arrastradas...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                    <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <div class="qq-thumbnail-wrapper">
                        <a class="preview-link" target="_blank">
                            <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                        </a>
                    </div>
                    <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                    <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                        <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                        Reintentar
                    </button>

                    <div class="qq-file-info">
                        <!-- <div class="qq-file-name">
                        <span class="qq-upload-file-selector qq-upload-file"></span>
                        <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    </div>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text"> -->
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                        <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                        <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                        <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                    </button>
                </div>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cerrar</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Si</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancelar</button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
    </div>
</script>
<script src="{{asset('js/uploadalbum.js')}}"></script>

@endsection
