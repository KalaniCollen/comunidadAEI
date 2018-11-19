@extends('layouts.admin')
@section('content')
<div style="overflow-x:auto;">
<div class="box box-primary col-xs-12">

                <div class="box-header">
                  <h3 class="box-title">Creacion de Usuarios</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>

<form  id="f_nuevo_usuario"  method="post"  action="agregar_nuevo_usuario" class="form-horizontal form_entrada" >
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<div class="box-body col-xs-12">


<div class="form-group col-xs-6">
                      <label for="name">Nombres</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Nombres" required>
</div>
<div class="form-group col-xs-6">
                      <label for="apellido_paterno">Apellido Paterno</label>
                      <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno" required>
</div>
<div class="form-group col-xs-6">
                      <label for="apellido_materno">Apellido Materno</label>
                      <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno" required>
</div>

<div class="form-group col-xs-6">
    <label for="type">Tipo de documento</label>

     <select id="type" name="type" class="form-control">
<option value="asociado">Asociado</option>
<option value="no asociado">No Asociado</option>

    </select>
</div>

<div class="form-group col-xs-12">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
</div>


<div class="form-group col-xs-12">
                      <label for="email">password*</label>
                      <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
</div>

</div>


<div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
</div>


</form>

</div>
</div>

@stop
