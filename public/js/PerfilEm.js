$(document).ready(function(){
 $(".boton01").hide();
 $('#conectar').click(function(){
   $('button').toggleClass('active');
   $('.title').toggleClass('active');
   $('nav').toggleClass('active');
 });
});
var datos="";
$('body').on('click', '#Tarjeta', function(){
$('#Modelotarjeta').modal('show');
});
$('body').on('click', '#cls', function(){
$('#Modelotarjeta').modal('hide');
});
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
  $('body').on('click', '.btn-success', function(){
    $(".boton01").hide();

$('.mensaje').empty();
   var name = $(this).attr('name');
   var dato = $('#'+name+'data').val();
   var tabla = $('#'+name+'dato').attr('data');
   var campo = name.replace('_',' ');
   var id =$(this).attr('id');
   var clase =$(this).attr('class').replace('_','');
   var ide = $("#id").val();
   var route = url+"PerfilEEditar/"+ide+"";
   var token = $("#token").val();
var nombrecampo = $('#'+name+'campo').attr('data');
 $.ajax({
         type:'PUT',
         url: route,
         headers: {'X-CSRF-TOKEN': token},
         datatype: "json",
         data: {
           name: name,
           campo: campo,
           dato: dato,
           id: id,
           clase: clase,
           tabla: tabla,
           nombrecampo:nombrecampo
          },
         success: function(data){
           if(name=="Nombre_Empresa"){
             window.location=url+'PerfilEmpresa/'+data;
           }else{
             if(name=="Descripcion"){
               location.reload();
             }else{
             $('#'+name).empty().html(data);
               $(".boton01").hide();
         }}}
     });
 });
 $('body').on('click', '.boton01', function(){
   $('.mensaje').empty();
   var name = $(this).attr('name');
    datos=$("#"+name).html();
   var name = $(this).attr('name');
   var dato = $('#'+name+'data').html();
   var campo = name.replace('_',' ');
   var id =$(this).attr('id');
   var clase ="_"+$(this).attr('class');
   var tabla = $('#'+name+'dato').attr("data")
   var nombrecampo = $('#'+name+'campo').attr('data');
   $.ajax({
         type:'get',
         url:url+'PerfilE',
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
          url:url+'PerfilE',
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
