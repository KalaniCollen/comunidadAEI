$(document).ready(function(){
 $(".boton01").hide();
  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.bind({
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });
    $('body').on('click', '#Ventana', function(){
$('#uploadimageModal').modal('show');
var el = document.getElementById('image_demo');

 $image_crop = new Croppie(el, {
//var $image_crop = $('#image_demo').croppie({
//  $image_crop = document.getElementById('#image_demo').croppie({
	enableExif: true,
	viewport: {
		width:200,
		height:200,
		type:'circle' //circle
	},
	boundary:{
		width:300,
		height:300,
	}

});
$('#Muestra').attr('onerror',"this.src='/storage/img/DefaultEmpresa.png'");
$('#Muestra').attr('src','/storage/img/DefaultEmpresa.png');

$('#Muestra').attr('style',"width:100%;height:100%;")
});
  $('.crop_image').click(function(event){
    $image_crop.result( {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:url+"upload.php",
        type: "POST",
        data:{"image": response,
            carpeta:'ImagenEmpresa'
      },
        success:function(data)
        {

          $('#uploadimageModal').modal('hide');
        //  alert(data);
          //$('#container2').empty().html(data);
          guardar(data);

          $('#Carga').empty().html("<img src=/storage/ImagenEmpresa/"+data+" alt=Avatar class=img-thumbnail style=border-radius:150px; id=matrix>");

        }
      });
    })
  });
var guardar  = function(datos) {

var ide = $("#id").val();
var dato="/storage/ImagenEmpresa/"+datos;
var route=url+"PerfilEEditar/"+ide+"";
var token = $("#token").val();
  $.ajax({
    type: "PUT",
    headers:{'X-CSRF-TOKEN': token},
    datatype: "json",
    url:  route,
    data:{
      name:"imagen",
      tabla:"perfil",
      dato: dato,
      id:ide,
    },
    success:function(data)
    {


    }
  });
}
});
