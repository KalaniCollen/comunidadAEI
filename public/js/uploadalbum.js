


$(document).ready(function(){


    $lg.lightGallery();
    $('body').on('click', '#lg-share', function(){
      $lg.data('lightGallery').destroy();
      imagen=$('.lg-sub-html').html();

      $("#mi-modal").show();
    });
    $('body').on('click', '#conf', function(){

      $("#not").hide();
    });
var modalConfirm = function(callback){
$("#modal-btn-si").on("click", function(){
callback(true);
$("#mi-modal").hide();
});
$("#modal-btn-no").on("click", function(){
callback(false);
$("#mi-modal").hide();
});
};

modalConfirm(function(confirm){
if(confirm){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'delete',
url:url+'DeleteImagen',
datatype: "json",
data:{
imagen:imagen,
album:album,
},

success:function(msg){
if(msg == 'ok'){

$('#not').show();

$("#galeria").load(" #galeria");
  // location.reload();
}
else{
  $('.statusMsg').html('<span style="color:red;">Ocurrio un problema, intentalo de nuevo mas tarde.</span>');
}
$('.submitBtn').removeAttr("disabled");
$('.modal-body').css('opacity', '');
}
});
}else{
//Acciones si el usuario no confirma
$("#result").html("NO CONFIRMADO");
}
});
});
  $('body').on('click', '#abrir', function(){
$('#myModal').show();
$("#galeria").load(" #galeria");

});
$('body').on('click', '.close', function(){
$('#myModal').hide();
$("#galeria").load(" #galeria");

});
      $('#fine-uploader-manual-trigger').fineUploader({
          template: 'qq-template-manual-trigger',
          request: {
              endpoint: url+'Imagenes/'+album,
              customHeaders: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
          },
          thumbnails: {
              placeholders: {
                  waitingPath: url+'galeria/placeholders/waiting-generic.png',
                  notAvailablePath: url+'galeria/placeholders/not_available-generic.png'
              }
          },
          validation: {
              allowedExtensions: ['jpeg', 'jpg', 'png'],
              // itemLimit: 3,
              sizeLimit: 4000048 // 50 kB = 50 * 1024 bytes
          },
          autoUpload: false
      });

      $('#trigger-upload').click(function() {
          $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
         $("#galeria").load(" #galeria");



           });
