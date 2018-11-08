$(document).ready(function(){
 $(".boton01").hide();

});
var datos="";
$('body').on('mouseover', '.eff', function(){

    var op=$(this).attr('data');

    		$("#"+op).show();
  	});
  $('body').on('mouseout', '.eff', function(){
      var op=$(this).attr('data');

    		$("#"+op).hide();
 	});

    $('body').on('click', '.btn-danger', function(){
      $('.mensaje').empty();
        var name= $(this).attr('name');

        $('#'+name).empty().html(datos);
        $(".boton01").hide();
    });
    $('body').on('click', '#myonoffswitch', function(){
      var ide = $("#id").val();
      var status= $("#myonoffswitch").attr('checked');

      var dato;
      var mensaje;
      if(status=="checked"){
      $("#myonoffswitch").attr('checked',false);
        dato=1;
        mensaje="Privado";
      }
      else{
          $("#myonoffswitch").attr('checked',true);
        mensaje="Publico";
        dato=0;
      }
      var route=url+"PerfilEditar/"+ide+"";
      var token = $("#token").val();
        $.ajax({
          type: "PUT",
          headers:{'X-CSRF-TOKEN': token},
          datatype: "json",
          url:  route,
          data:{
            name:"privacidad",
            tabla:"perfil",
            dato: dato,
            id:ide,
          },
          success:function(data)
          {

$("#privacidad").empty().html("privacidad: "+mensaje);
          }
        });
    });
  $('body').on('click', '.btn-success', function(){

    $('.mensaje').empty();
   var name = $(this).attr('name');
   var dato = $('#'+name+'data').val();
   var tabla = $('#'+name+'dato').attr('data');
   // var campo = name.replace('_',' ');
   var id =$(this).attr('id');
   var clase =$(this).attr('class').replace('_','');
   var ide = $("#id").val();
   var route = url+"PerfilEditar/"+ide+"";
   var token = $("#token").val();
   var nombrecampo = $('#'+name+'campo').attr('data');
 $.ajax({
         type:'PUT',
         url: route,
         headers: {'X-CSRF-TOKEN': token},
         datatype: "json",
         data: {
           name: name,
           // campo: campo,
           dato: dato,
           id: id,
           clase: clase,
           tabla: tabla,
           nombrecampo:nombrecampo
          },
         success: function(data){
           if(name=="name" ||name=="Apellido_Materno" || name=="Apellido_Paterno"){
             window.location=url+'perfilUsuario/'+data;
           }else{
$("#dat").load(" #dat");
             $('#'+name).empty().html(data);
             $(".boton01").hide();
           }
         }
     });
 });
 $('body').on('click', '.boton01', function(){
$('.mensaje').empty();
   var name = $(this).attr('name');
    datos=$("#"+name).html();

   var dato = $('#'+name+'data').html();
   var campo = name.replace('_',' ');
   var id =$(this).attr('id');
   var clase ="_"+$(this).attr('class');
   var tabla = $('#'+name+'dato').attr("data")
   var nombrecampo = $('#'+name+'campo').attr('data');
   $.ajax({
         type:'get',
         url:url+'Perfil',
         datatype: "json",
         data: {
           name: name,
           campo: campo,
           dato: dato,
           id: id,
           clase: clase,
           tabla:tabla,
           nombrecampo:nombrecampo
          },
         success: function(data){
             $('#'+name).empty().html(data);
         }
     });


 });
  $(".boton01").click(function(){
    $('.mensaje').empty();
    var name = $(this).attr('name');
     datos=$("#"+name).html();
    var name = $(this).attr('name');
    var dato = $('#'+name+'data').html();

    var campo = name.replace('_',' ');
    var id =$(this).attr('id');
    var clase ="_"+$(this).attr('class');
    var tabla = $('#'+name+'dato').attr("data");
    var nombrecampo = $('#'+name+'campo').attr('data');
  $.ajax({
          type:'get',
          url:url+'Perfil',
          datatype: "json",
          data: {
            name: name,
            campo: campo,
            dato: dato,
            id: id,
            clase: clase,
            tabla:tabla,
            nombrecampo:nombrecampo
           },
          success: function(data){
              $('#'+name).empty().html(data);

          }
      });
      });
 $('body').on('click', '#tarjet', function(){

$("#tarjeta").modal('show');
    });
