

$(document).ready(function(){

  $lg.lightGallery({
      thumbnail:true,
      download:true,
        loadYoutubeThumbnail: true,
        youtubeThumbSize: 'default',
showThumbByDefault:true,
        exThumbImage:false,
    });

    $('body').on('click', '#lg-share', function(){
      $lg.data('lightGallery').destroy();
      video=$('.lg-sub-html').html();
      $("#mi-modal").show();
    });
var imagen =function(i){
  $(this).val('src','img/YouTube.jpg');
}
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
//Acciones si el usuario confirma
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'delete',
url:url+'DeleteVideo',
datatype: "json",
data:{
video:video,
},

success:function(msg){
    if(msg == 'ok'){

    $("#galeria").load(" #galeria");
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
$('#modalForm').show();
});
$('body').on('click', '.close', function(){
$('#modalForm').hide();
});
$('body').on('click', '.clos', function(){
$('#modalForm').hide();
});
function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var name = $('#inputName').val();

    if(name.trim() == '' ){
        alert('Introduce un link.');
        $('#inputName').focus();
        return false;

    }else{
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $.ajax({
            type:'POST',
            url:url+'CreateVideo',
            datatype: "json",
            data:{
            nombre:name,
          },
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputName').val('');
                  location.reload();
                    $('.statusMsg').html('<span style="color:green;">Tu video ha sido guardado.</p>');
                }
                else{
                    $('.statusMsg').html('<span style="color:red;">Ocurrio un problema, intentalo de nuevo mas tarde.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
