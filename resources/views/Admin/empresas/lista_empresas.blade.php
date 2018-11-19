<div style="overflow-x:auto;">
<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Lista de Usuarios</h4>

</div>

<div class="box-body">
<?php

if( count($empresas) >0){
?>

<table id="tabla_usuarios" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th style="width:10px">Id</th>

                <th>Nombre</th>

                <th>Tipo de empresa</th>
                <th>Giro Empresa</th>
                <th>Direccion Empresa</th>

                <th>Fecha Creacion</th>

            </tr>
        </thead>
<tbody>

<?php

   foreach($empresas as $empresa){
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $empresa->id_empresa; ?></td>
    <td><?= $empresa->nombre_empresa;  ?></td>
    <td><?= $empresa->tipo_empresa;  ?></td>
    <td><?= $empresa->giro_empresa;  ?></td>
    <td><?= $empresa->direccion_empresa;  ?></td>
    <td><?= $empresa->created_at;  ?></td>
    <td>

</tr>
<?php
}
?>
    </table>

<?php
}

?>
</div>
</div>
