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
                    <a href="cancelar/registro/{{$evento->id_evento  }}" class="btn btn-primary">Registrar invitado</a>
                    @if(empty($asistencia))
                    <a href="registro/{{$evento->id_evento  }}" class="btn btn-primary">Registarse</a>
                @else Ya estas registrado para este evento
                    <a href="cancelar/registro/{{$evento->id_evento  }}" class="btn btn-primary">Cancelar</a>
                @endif

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
                            Fecha de Inicio: {{$evento->fecha_inicio  }}
                        </div>
                        <div class="col-md-6">
                            Fecha de termino: {{$evento->fecha_final  }}
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
                            Descripcion: {{$evento->descripcion_evento  }}
                        </div>
                        <div class="col-md-6">
                            Direccion: {{$evento->direccion_evento  }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Ponente: {{$evento->ponente  }}
                        </div>
                        <div class="col-md-6">
                            Organizador: {{$evento->organizador  }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Correo electronico: {{$evento->correo_electronico_organizador  }}
                        </div>
                        <div class="col-md-6">
                            Telefono: {{$evento->telefono_organizador  }}
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
