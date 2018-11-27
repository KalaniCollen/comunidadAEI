@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset ('css/logros.css')}}"/>

@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center> Logros:</center><br>"Los logros de una organización son los resultados del esfuerzo combinado de cada individuo"-Vince Lombardi </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="panel-body" align="center">
                    <form class="form-horizontal" method="POST" action="{{ route('ActualizarLogro') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}
                              {{-- /storage/img/DefaultEmpresa.png --}}
                    <img src="{{$MisLogros->img_logros  }}" onerror="this.src='/storage/img/DefaultEmpresa.png'" id="image" width="-webkit-fill-available" height="230px" />
                    <input type="file" name="img_logros" id="file-upload" class="btn btn-default" accept="image/*"  style="color: transparent;"/>
                                  <div id="mis_logros">
                                  <textarea type="textarea" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" name="MisLogros" id="MisLogros"  rows="6" cols="60" value="" style="" placeholder="MIS LOGROS SON...">{{ $MisLogros->mis_logros }}</textarea>  &nbsp;
                                  </div>
                                  <div class="form-group">

                                          <button type="submit" class="btn btn-primary">
                                              Guardar
                                          </button>
                                          <a href="/MisLogros/{{ $MisLogros->slug_empresa }}" class="btn btn-primary">
                                                  Cancelar
                                          </a>

                                  </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
      function readFile(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  var filePreview = document.createElement('img');
                  filePreview.id = 'file-preview';
                  //e.target.result contents the base64 data from the image uploaded
                  filePreview.src = e.target.result;
                  $('#image').attr('src',e.target.result);


              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      var fileUpload = document.getElementById('file-upload');
      fileUpload.onchange = function (e) {
          readFile(e.srcElement);
      }

  </script>
@endsection
