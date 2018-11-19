@extends('layouts.admin')
@section('content')


<div style="overflow-x:auto;">
<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Lista de Eventos</h4>

</div>

<div class="box-body">

<table id="tabla_usuarios" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th style="width:10px">Id</th>

                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>Costo Asociado</th>
                <th>Costo No asociado</th>
                <th>Direccion</th>
                <th>Fecha Creacion</th>
                <th>Acción</th>
            </tr>
        </thead>
<tbody>

@foreach ($eventos as $key => $evento)


 <tr role="row" class="odd">
    <td class="sorting_1">{{ $evento->id_evento }}</td>
    <td class="mailbox-messages mailbox-name" >{{$evento->nombre_evento  }}</td>
    <td>{{ $evento->fecha_inicio }}</td>
    <td>{{ $evento->fecha_final }}</td>
    <td>{{ $evento->costo_asociado }}</td>
    <td>{{ $evento->costo_no_asociado }}</td>
    <td>{{ $evento->direccion }}</td>
    <td>{{ $evento->created_at}}</td>
    <td>
    <a href="{{url('eliminar_evento/'.$evento->id_evento)  }}" class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" ></a>
    @if($evento->estado_evento!=1)
    <a href="{{url('verificar_evento/'.$evento->id_evento)  }}" class="btn btn-lg btn-success glyphicon glyphicon-ok btn-xs" ></a>
@endif

</tr>
@endforeach

    </table>


</div>
</div>
@endsection
