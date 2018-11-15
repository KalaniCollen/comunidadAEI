@extends('layouts.head')
@section('styles')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('galeria/fine-uploader-gallery.css')}}" rel="stylesheet">
      <link href="{{asset('css/album.css')}}" rel="stylesheet">
      <link href="{{asset('css/lightgallery0.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
<link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<!-- <link href="./p_files/css" rel="stylesheet" type="text/css"> -->
{{-- <link href="{{asset('css/lightgallery.css')}}" rel="stylesheet"> --}}
</style>

@endsection
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Videos Subidos</div>
                  <div class="panel-body">
                        @include('multimedia.videos.subirvideo')
                      <br >
                      @if(!empty ($Videos))
                        <br />
                        <div id="galeria">


                          @foreach ($Videos as $key => $Videos)
  <!-- Hidden video div -->
  <div style="display:none;" id="{{ $Videos->id_video }}">
      <video class="lg-video-object lg-html5 video-js vjs-default-skin" controls preload="none">
          <source src="{{ $Videos->enlace }}" type="video/mp4">
           Your browser does not support HTML5 video.
      </video>
  </div>
@endforeach
<div class="demo-gallery dark mrb35" id="galeria" >

  <!-- data-src should not be provided when you use html5 videos -->

  <ul id="video-gallery" class="list-unstyled row">
    @foreach ($video as $key => $Videos)
    <li class="col-xs-6 col-sm-4 col-md-3 video" data-poster="{{ $Videos->enlace }}" data-sub-html="{{ $Videos->id_video }}" data-html="#{{ $Videos->id_video }}" >
        <img src="{{ $Videos->enlace }}" id="pre" preload="metadata" />
        <video src="{{ $Videos->enlace }}" width="90%" style="cursor: pointer;"></video>
    </li>
  @endforeach

  </ul>
  </div>
</div>


                                          @include('Modal.Confirmacion',array('multimedia' => 'El video'))
                        @if(empty ($Videos))
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
  var album="";
  var imagen;
    var $lg=$('#video-gallery');


  </script>
  {{-- <script  src="{{asset('js/Videos0.js')}}"></script> --}}

      <script src="{{asset('js/prettify.js')}}"></script>
      <script src="{{asset('js/froogaloop2.min.js')}}"></script>
      <script src="{{asset('js/jquery.justifiedGallery.min.js')}}"></script>
      <script src="{{asset('js/transition.js')}}"></script>
      <!-- <script src="./p_files/collapse.js"></script> -->
      <script src="{{asset('js/lightgallery.js')}}"></script>
      <!-- <script src="./p_files/lg-fullscreen.js"></script> -->
      <script src="{{asset('js/lg-thumbnail.js')}}"></script>
      <script src="{{asset('js/lg-video.js')}}"></script>
      <script src="{{asset('js/lg-share.js')}}"></script>

  {{-- <script src="{{asset('js/jquery.fine-uploader.js')}}"></script> --}}
<script src="{{asset('js/jquery0.fine-uploader.js')}}"></script>

<script src="http://vjs.zencdn.net/4.12/video.js"></script>
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
                            <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale width="120px">
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
  <script src="{{asset('js/uploadVideo.js')}}"></script>


 @endsection
