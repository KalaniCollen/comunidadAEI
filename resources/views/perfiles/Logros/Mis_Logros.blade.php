@extends('layouts.head')
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
                    <img src="/storage/img/DefaultEmpresa.png" />
                    <center>
                                  <div id="mis_logros">


                                  <textarea type="textarea" class="form-control" name="Mis_Logrosdata" id="Mis_Logrosdata"  rows="6" cols="60" value="" style="" placeholder="Mis logros son....">{{ $MisLogros->mis_logros }}</textarea>  &nbsp;

                                  </div>

                                </center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/Logros.js')}}" type="text/javascript"></script>
@endsection
