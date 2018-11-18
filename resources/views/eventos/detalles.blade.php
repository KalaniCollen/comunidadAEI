@extends('layouts.head')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />


@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$evento->nombre_evento  }}</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="panel-body" align="center">
                    <div class="row">
                        <div class="col-md-6">
                            Fecha inicio: {{$evento->fecha_inicio  }}
                        </div>
                        <div class="col-md-6">
                            Fecha final: {{$evento->fecha_final  }}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            Precio : ${{$evento->costo_no_asociado  }}
                        </div>
                        <div class="col-md-4">
                            Precio Asociado: ${{$evento->costo_asociado  }}
                        </div>
                        <div class="col-md-4">
                            Lugares disponibles :{{$lugares  }}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            Precio : ${{$evento->costo_no_asociado  }}
                        </div>
                        <div class="col-md-6">
                            Frecio Asociado: ${{$evento->costo_asociado  }}
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/bootstrap.min.js')}}" ></script>

@endsection
