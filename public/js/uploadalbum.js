const URL = "";
$(document).ready(function(){


    $('body').on('click', '#lg-share', function(){


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
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     type:'delete',
        //     url:url+'DeleteImagen',
        //     datatype: "json",
        //     data:{
        //         imagen:imagen,
        //         album:album,
        //     },
        //
        //     success:function(msg){
        //         if(msg == 'ok'){
        //
        //             $('#not').show();
        //
        //             $("#galeria").load(" #galeria");
        //             // location.reload();
        //         }
        //         else{
        //             $('.statusMsg').html('<span style="color:red;">Ocurrio un problema, intentalo de nuevo mas tarde.</span>');
        //         }
        //         $('.submitBtn').removeAttr("disabled");
        //         $('.modal-body').css('opacity', '');
        //     }
        // });
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
