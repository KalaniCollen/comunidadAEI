@extends('layouts.admin')
@section('content')


<div style="overflow-x:auto;">
<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Bolsa de trabajo</h4>

</div>

<div class="box-body">

<table id="tabla_usuarios" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th style="width:10px">Id</th>

             <th>Trabajo</th>
             <th>Empresa</th>
             <th>Salario</th>
             <th>Direccion</th>
             <th>Telefono</th>
            </tr>
        </thead>
<tbody>

@foreach ($bolsas as $key => $bolsa)


 <tr role="row" class="odd">

    <td>{{ $bolsa->nombre }}</td>
    <td>{{ $bolsa->empresa }}</td>
    <td>{{ $bolsa->salario }}</td>
    <td>{{ $bolsa->direccion }}</td>
    <td>{{ $bolsa->telefono }}</td>
    <td>{{ $bolsa->created_at}}</td>
    <td>
    <a href="{{url('eliminar_bolsa/'.$bolsa->id_trabajo)  }}" class="btn btn-lg btn-danger glyphicon glyphicon-trash btn-xs" ></a>


</tr>
@endforeach

    </table>


</div>
</div>
@endsection
