$(document).ready(function(){
  });
  $('#Mis_Logrosdata').attr("disabled",true);
  $('body').on('click', '#Guardar', function(){
     var name = $(this).attr('name');

   var dato = $('#'+name+'data').val();
   var ide=$('#id').val();
   var route = "http://localhost:8000/MisLogrosEditar/"+ide+"";
   var token = $("#token").val();
 $.ajax({
         type:'PUT',
         url: route,
         headers: {'X-CSRF-TOKEN': token},
         datatype: "json",
         data: {
           name: name,
           dato: dato
          },
         success: function(data){
var dato=data.data;
$('#Mis_Logrosdata').attr("disabled",true);
$('#Mis_Logrosdata').attr("Style","border: none;background-color:#ffffff; ");
$('#opciones').empty().html("<input type=button name=Mis_Logros id=boton01 class=btn-link value=Editar>");

             $('#Mis_Logrosdata').empty().html(dato);
         }
     });
 });
 $('body').on('click', '.btn-link', function(){

   $('#Mis_Logrosdata').attr("disabled",false);
   $('#Mis_Logrosdata').attr("Style"," cursor: text");
$('#opciones').empty().html("<input type=button name=Mis_Logros id=Guardar class=btn-success value=Guardar><input type=button name=Mis_Logros id=Cancelar class=btn-danger value=Cancelar>");
 });
 $('body').on('click', '#Cancelar', function(){
   $('#Mis_Logrosdata').attr("disabled",true);
   $('#Mis_Logrosdata').attr("Style","border: none;background-color:#ffffff;");
$('#opciones').empty().html("<input type=button name=Mis_Logros id=boton01 class=btn-link value=Editar>");
 });

$('body').on('mouseover', '.eff', function(){


    		$("#opciones").show();
  	});
