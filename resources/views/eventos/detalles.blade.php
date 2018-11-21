@extends('layouts.head')
@section('content')
<section class="section">
    <section class="section__header">
        {{-- <h1 class="section__title">Evento</h1> --}}
        <h1 class="section__title">{{ $evento->nombre_evento }}</h1>
        <a href="{{ route('/') }}" class="btn btn--accent">Registrarse</a>
    </section>

    <div class="row section__content">
        <div class="col-md-4 col-lg-4">
            <p class="h3">Fecha</p>
            <p>{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d M Y') }}</p>
            <br>
            <p class="h3">Hora</p>
            <p>{{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('H:i') }} hrs.</p>
            <br>
            <p class="h3">Descripción del evento</p>
            <p>{{ $evento->descripcion_evento }}</p>
            <br>
            <p class="h3">Costos</p>
            <p><b>Asociado:</b> $@money($evento->costo_asociado)</p>
            <p><b>No asociado:</b> $@money($evento->costo_no_asociado)</p>
            <br>
            <p class="h3">Ponente</p>
            <p>{{ $evento->ponente }}</p>
            <br>
            <p class="h3">Capacidad del lugar</p>
            <p>{{ $evento->num_invitados }} asistentes</p>
            <br>
            <p class="h3">Organizador</p>
            <p>{{ $evento->organizador }}</p>
            <br>
            <p class="h3">Teléfono del organizador</p>
            <p>{{ $evento->telefono_organizador }}</p>
            <br>
            <p class="h3">Correo del organizador</p>
            <p>{{ $evento->correo_electronico_organizador }}</p>
        </div>
        <div class="col-md-8 col-lg-8">
            <img src="/img/evento.png" alt="">
        </div>
    </div>
</section>
        {{-- <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$evento->nombre_evento  }}</div>
                    <a href="registro/invitado/{{$evento->id_evento  }}" class="btn btn-primary">Registrar invitado</a>
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
    </div> --}}
@endsection
