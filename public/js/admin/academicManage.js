function cargarformulario(arg){
//funcion que carga todos los formularios del sistema

		if(arg==1){ var url = "form_nuevo_usuario"; }
		$("#contenido_principal").html($("#cargador_empresa").html());

		$.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })
}



function cargarlistado(listado){    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_usuarios"; }
if(listado==2){ var url = "lista_users_noModifica"; }
$("#contenido_principal").html($("#cargador_empresa").html());

    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
   })

}function cargarlistadoaso(listado){    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_usuarios_asociados"; }
if(listado==2){ var url = "lista_users_noModifica"; }
$("#contenido_principal").html($("#cargador_empresa").html());

    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
   })

}
function cargarlistadonoa(listado){    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_usuarios_no_asociados"; }
if(listado==2){ var url = "lista_users_noModifica"; }
$("#contenido_principal").html($("#cargador_empresa").html());

    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
   })

}
function cargarempresas(listado){    //funcion para cargar los diferentes  en general
if(listado==1){ var url = "listado_empresas"; }
if(listado==2){ var url = "lista_users_noModifica"; }
$("#contenido_principal").html($("#cargador_empresa").html());

    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
   })

}

 $(document).on("submit",".form_entrada",function(e){
//funcion para atrapar los formularios y enviar los datos
       e.preventDefault();

        $('html, body').animate({scrollTop: '0px'}, 200);

        var formu=$(this);
        var quien=$(this).attr("id");

        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario"; var divresul="notificacion_resul_fanu"; }
        if(quien=="f_editar_usuario"){ var varurl="actualizar_usuario"; var divresul="notificacion_resul_feu"; }
        if(quien=="f_cambiar_password"){ var varurl="cambiar_password"; var divresul="notificacion_resul_fcp"; }
        if(quien=="f_editar_pub"){ var varurl="actualizar_pub"; var divresul="notificacion_resul_fep"; }

        $("#"+divresul+"").html($("#cargador_empresa").html());
              $.ajax({
                    type: "POST",
                    url : varurl,
                    datatype:'json',
                    data : formu.serialize(),
                    success : function(resul){

                        $("#"+divresul+"").html(resul);
                        if(quien=="f_nuevo_usuario"){
                         $('#'+quien+'').trigger("reset");
                        }
                    }
                });
})


$(document).on("click",".pagination li a",function(e){
//para que la pagina se cargen los elementos
 e.preventDefault();
 var url =$( this).attr("href");
 $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);
 })
})


  //leccion 7
function mostrarficha(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
  var url = "form_editar_usuario/"+id_usuario+"";
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}

function mostrarperfil(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
  $("#capa_para_edicion").show();
   var url = "PerfilUsuario/"+id_usuario+"";
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#capa_para_edicion").html(resul);
  })
}

function borrarusu(id_usuario){    //funcion para cargar los diferentes  en general
var url = "borrarusu/"+id_usuario;
$("#contenido_principal").html($("#cargador_empresa").html());
    $.get(url,function(resul){
        $("#contenido_principal").html(resul);
   })
}



$(document).on("click",".div_modal",function(e){
 //funcion para ocultar las capas modales
 $("#capa_modal").hide();
 $("#capa_para_edicion").hide();
 $("#capa_para_edicion").html("");

})


  $(document).on("submit",".formarchivo",function(e){


        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");

        if(nombreform=="f_subir_imagen" ){ var miurl="subir_imagen_usuario";  var divresul="notificacion_resul_fci"}
        if(nombreform=="f_cargar_datos_usuarios" ){ var miurl="cargar_datos_usuarios";  var divresul="notificacion_resul_fcdu"}
        if(nombreform=="f_enviar_correo" ){ var miurl="enviar_correo";  var divresul="contenido_principal"}
        if(nombreform=="form-cargaDatoEstudiante" ){ var miurl="cargarDatos";  var divresul="notificacion_cargueDatos"}
        if(nombreform=="f_enviar_correo_rector" ){ var miurl="enviar_correo_rector";  var divresul="contenido_principal"}

        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax
        $.ajax({
            url: miurl,
            type: 'POST',

            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());
            },
            //una vez finalizado correctamente
            success: function(data){
              $("#"+divresul+"").html(data);
              $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );
            },
            //si ha ocurrido un error
            error: function(data){
               alert("Ha ocurrido un error") ;
            }
        });
});


function buscarusuario(){

  var dato=$("#dato_buscado").val();
      if(dato == ""){
      var url="buscar_usuarios/_";
    }
    else {
      var url="buscar_usuarios/"+dato+"";
    }

  $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);
  })
}
