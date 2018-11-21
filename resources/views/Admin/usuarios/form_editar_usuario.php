<div style="overflow-x:auto;">
<div class="row">

  <div class="col-md-6">

        <div class="box box-primary">

                <div class="box-header">
                  <h3 class="box-title">Editar información del Usuario</h3>
                </div><!-- /.box-header -->





<form  id="f_editar_usuario"  method="post"  action="actualizar_usuario" class="form-horizontal form_entrada" >
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="id" value="<?= $usuario->id_usuario; ?>">


<div class="box-body col-xs-12">

                <div class="form-group col-xs-6">
                      <label for="name">Nombres</label>
                      <input type="text" class="form-control" id="name" name="name"  value="<?= $usuario->name; ?>"  >
                  </div>
<div class="form-group col-xs-6">
                      <label for="last_name">Apellido Paterno</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $usuario->apellido_paterno; ?>" >
</div>
<div class="form-group col-xs-6">
                      <label for="last_names">Apellido Materno</label>
                      <input type="text" class="form-control" id="last_names" name="last_names" value="<?= $usuario->apellido_materno; ?>" >
</div>



<div class="form-group col-xs-6">
                      <label for="type">Tipo Usuario</label>


                       <select id="type" name="type" class="form-control">
<option value="asociado">Asociado</option>
<option value="no asociado">No Asociado</option>

                      </select>

</div>


<div class="form-group col-xs-12">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email"  value="<?= $usuario->email; ?>" >
</div>


</div>

<div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
</div>

</form>
</div>

</div> <!-- end col mod 6 -->

  <div class="col-md-6 col-xs-12">
<div id="notificacion_resul_feu"></div>
      <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Cambiar Password</h3>
                      </div><!-- /.box-header -->

                      <div id="notificacion_resul_fcp"></div>
                      <!-- form start -->
                      <form method="post" id="f_cambiar_password" class="form_entrada" action="cambiar_password" >
                           <input type="hidden" name="id_usuario_password" value="<?= $usuario->id_usuario; ?>">
                         <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Password">
                          </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Cambiar Datos</button>
                        </div>
                      </form>
                    </div>

  </div>    <!-- end col mod 6 -->


</div> <!-- end row -->
