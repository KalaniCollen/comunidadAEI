$(document).ready(function(){
 $('#conectar').click(function(){
   $('button').toggleClass('active');
   $('.title').toggleClass('active');
   $('nav').toggleClass('active');
 });
});
function servicio(){
var checkbox =   document.getElementById('Servicio');
if (checkbox.checked != true){
$('#servicio_empresa').attr('style',"display:none");
$('#servicio_empresa').attr('val',"");
}
else{
$('#servicio_empresa').attr('style',"");
}
}
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