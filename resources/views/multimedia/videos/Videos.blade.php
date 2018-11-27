@extends('layouts.app')
@section('styles')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('galeria/fine-uploader-gallery.css')}}" rel="stylesheet"> --}}
      {{-- <link href="{{asset('css/album.css')}}" rel="stylesheet"> --}}


      <link href="{{asset('css/lightgallery.css')}}" rel="stylesheet">
      {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
      <link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjetadesplegar.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{ asset ('css/tarjetadesplegar.css')}}"/>
      <link href="{{asset('css/justifiedGallery.min.css')}}" rel="stylesheet">
            <!-- <link href="./p_files/css" rel="stylesheet" type="text/css"> -->
            <link href="{{asset('css/lightgallery.css')}}" rel="stylesheet">

@endsection
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                        {{-- @include('multimedia.subir') --}}
                      <br >
                      <div id="contenido">
                          @include('Modal.VideoModal')
                          <br />
                          @if(!empty ($Videos))
                              <br />
                              <div class="demo-gallery dark mrb35" id="galeria" >
                                  <ul id="video-thumbnails" class="list-unstyled row">
                                      @foreach ($Videos as $key => $Videos)
                                                 <li class="col-xs-6 col-sm-4 col-md-3 video" data-src="{{$Videos->enlace  }}" data-sub-html="{{ $Videos->id_video }}">
                                                    <a href="">
                                                        <img class="img-responsive" src="http://img.youtube.com/vi/{{ $Videos->codigo }}/0.jpg"  onerror="this.src='/storage/img/YouTube.jpg'"/>
                                                        <div class="demo-gallery-poster">
                                                            <img src="../img/play-button.png">
                                                        </div>
                                                    </a>
                                                 </li>
                                      @endforeach
                                  </ul>
                              </div>
                              @include('Modal.Confirmacion',array('multimedia' => 'El video'))
                          @else
                              @if(empty ($Videos))
                                  No hay Videos
                              @endif
                          @endif
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
@section('scripts')
  <!-- Fine Uploader Thumbnails template w/ customization
  ====================================================================== -->
  <script type="text/javascript">
var url="{{ asset('') }}";
var album="";
var video;
  var $lg=$('#video-thumbnails');
  </script>
  <script  src="{{asset('js/Videos.js')}}"></script>

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

@endsection
