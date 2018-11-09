@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">

                  @if(!empty($mensaje))
              {{$mensaje}}
              @else
              Verifica tu correo electronico
              @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection