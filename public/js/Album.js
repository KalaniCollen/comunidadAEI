/******/ var Mostrar = function(id){
/******/
/******/    var route =servidor+"album/"+id+"/edit";
/******/    $.get(route, function(data){
/******/    $("#id").val(data.id_album);
/******/    $("#name").val(data.nombre);
/******/    });
/******/ }
/******/ $("#actualizar").click(function(){
/******/
/******/    var id = $("#id").val();
/******/    var name = $("#name").val();
/******/    var route = servidor+"AlbumUpdate";
/******/    var token = $("#token").val();
/******/    $.ajaxSetup({
/******/        headers: {
/******/            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
/******/        }
/******/    });
/******/    $.ajax({
/******/        url: route,
/******/        type: 'PUT',
/******/        dataType: 'json',
/******/        data: {
/******/          id: id,
/******/          name: name
/******/        },
/******/        success: function(data){
/******/
/******/             if (data.success == 'true'){
/******/                location.reload();
/******/                $("#myModal").modal('toggle');
/******/                $("#message-update").fadeIn();
/******/             }
/******/        },
/******/        error:function(data){
/******/            $("#message-error").fadeIn();
/******/        }
/******/    });
/******/ });
/******/var Eliminar = function(id,name){
/******/
/******/     // ALERT JQUERY
/******/    $.alertable.confirm("¿Está seguro de eliminar el registro?"+name).then(function() {
/******/
/******/          var route = servidor+"DeleteAlbum/"+id;
/******/          var token = $("#token").val();
/******/          $.ajaxSetup({
/******/            headers: {
/******/                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
/******/            }
/******/          });
/******/          $.ajax({
/******/            url: route,
/******/            headers: {'X-CSRF-TOKEN': token},
/******/            type: 'DELETE',
/******/            dataType: 'json',
/******/            success: function(data){
/******/                if (data.success == 'true'){
/******/                    location.reload();
/******/                    $("#message-delete").fadeIn();
/******/                    // $('#message-delete').toggle(3000);
/******/                    $('#message-delete').show().delay(3000).fadeOut(1);
/******/                }
/******/            }
/******/          });
/******/    });
/******/};
/******/ $('body').on('click', '#abrir', function(){
/******/    $('#modalForm').show();
/******/ });
/******/ $('body').on('click', '.close', function(){
/******/    $('#modalForm').hide();
/******/ });
/******/ function submitContactForm(){
/******/    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
/******/    var name = $('#inputName').val();
/******/
/******/    if(name.trim() == '' ){
/******/        alert('Introduce un nombre.');
/******/        $('#inputName').focus();
/******/        return false;
/******/
/******/    }else{
/******/      $.ajaxSetup({
/******/        headers: {
/******/            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
/******/        }
/******/      });
/******/      $.ajax({
/******/            type:'POST',
/******/            url:servidor+'CreateAlbum',
/******/            datatype: "json",
/******/        data:{
/******/            nombre:name,
/******/        },
/******/        beforeSend: function () {
/******/            $('.submitBtn').attr("disabled","disabled");
/******/            $('.modal-body').css('opacity', '.5');
/******/        },
/******/        success:function(msg){
/******/                if(msg == 'ok'){
/******/                    $('#inputName').val('');
/******/                    location.reload();
/******/                    $('.statusMsg').html('<span style="color:green;">Tu Album ha sido creado</p>');
/******/                }
/******/                else{
/******/                    $('.statusMsg').html('<span style="color:red;">Ocurrio algun problema intentalo de nuevo.</span>');
/******/                }
/******/                $('.submitBtn').removeAttr("disabled");
/******/                $('.modal-body').css('opacity', '');
/******/        }
/******/      });
/******/    }
/******/}
