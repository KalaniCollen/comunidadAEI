@extends('layouts.admin')
@section('styles')


@endsection
@section('content')
    <div style="overflow-x:auto;">
    <div class="box box-primary col-xs-12">

                    <div class="box-header">
                      <h3 class="box-title">Agregar trabajo</h3>
                    </div><!-- /.box-header -->

    <div id="notificacion_resul_fanu"></div>

    <form    method="POST"  action="{{route('agregar_Ntrabajo')  }}"  >
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <div class="box-body col-xs-12">


    <div class="form-group col-xs-6">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre trabajo" required>
    </div>
    <div class="form-group col-xs-6">
                          <label for="empresa">Empresa</label>
                          <input type="text" class="form-control" id="empresa" name="empresa" placeholder="AEI" required>
    </div>
    <div class="form-group col-xs-6">
                          <label for="salario">Salario</label>
                          <input type="text" class="form-control" id="salario" name="salario" placeholder="$" required>
    </div>
    <div class="form-group col-xs-6">
                          <label for="telefono">Telefono</label>
                          <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="55-44-66-22-77">
    </div>


    <div class="form-group col-xs-12">
                          <label for="direccion">Direccion</label>
                          <input type="direccion" class="form-control" id="direccion" name="direccion" placeholder="Direccion" >
    </div>


    <div class="form-group col-xs-12">
                          <label for="descripcion">Descripcion</label>
                          <input type="descripcion" class="form-control" id="descripcion" name="descripcion" required >
    </div>


    </div>


    <div class="box-footer col-xs-12 ">
                        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>


    </form>

    </div>
    </div>
@endsection
@section('scripts')

@endsection
