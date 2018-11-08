@extends('layouts.app')
@section('style')
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
                <form class="form-horizontal" >


                    <center>
                      <div id="opciones" >
                       <input type="button" name="Mis_Logros" id="boton01" class="btn btn-link" value="Editar">
                     </div>
                   </center>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" >
        <input type="hidden" id="id" value="{{ auth()->user()->Id_Usuario }}">

                <center>
                <div id="Mis_Logros">


                <textarea type="textarea" class="form-control" name="Mis_Logrosdata" id="Mis_Logrosdata"  rows="6" cols="60" value="" style="">{{ $MisLogros->Mis_Logros }}</textarea>  &nbsp;

                </div>

              </center>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/Logros.js')}}" type="text/javascript"></script>
@endsection
