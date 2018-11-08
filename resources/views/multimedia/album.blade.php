@extends('layouts.app')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/reset.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset ('css/styles.css')}}"/>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset ('css/album.css')}}"/> --}}


@endsection
@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Album</div>
                  <div class="panel-body">
                    @if(!empty ($Album))
                      {{-- @include('multimedia.lista') --}}

                    <br>
                    @include('multimedia.Albums')
                    @else
                      No hay nada

                      @include('Modal.Album')
                    @endif
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('script')

<script src="{{ asset('js/Album.js')}}" ></script>
<script>
var servidor ="{{asset ('') }}";
</script>
  @endsection
