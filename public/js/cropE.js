const URL = "/perfil-empresa";

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
        $('#Muestra').attr('onerror',"this.src='img/DefaultEmpresa.png'");
        $('#Muestra').attr('src','/img/DefaultEmpresa.png');

        $('#Muestra').attr('style',"width:100%;height:100%;")
    });
    $('.crop_image').click(function(event){
        $image_crop.result( {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            $.ajax({
                url:url+"/upload.php",
                type: "POST",
                data:{
                    image: response,
                    carpeta:'Imagen_Empresa'
                },
                success:function(data) {

                    $('#uploadimageModal').modal('hide');
                    //  alert(data);
                    //$('#container2').empty().html(data);
                    guardar(data);

                    $('#Carga').empty().html("<img src=/storage/Imagen_Empresa/"+data+" alt=Avatar class=img-thumbnail style=border-radius:150px; id=matrix>");
                }
            });
        });
    });
    var guardar  = function(datos) {
        let slug = document.getElementById('js-perfil-slug').value;
        let token = $("#js-perfil-token").val();
        console.log(slug);
        // ajaxData(`${URL}/${slug}`, 'PUT', token, { name: "imagen" }, function(){
        //     console.log("Imagen guardada");
        // });


        // var ide = $("#id").val();
        // var dato="/storage/Imagen_Empresa/"+datos;
        // var route=url+"PerfilEEditar";
        // var token = $("#token").val();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     type: "PUT",
        //     datatype: "json",
        //     url:  route,
        //     data:{
        //         name:"imagen",
        //         tabla:"perfil",
        //         dato: dato,
        //         id:ide,
        //     },
        //         success:function(data)
        //     {
        //
        //
        //     }
        // });
    }
});
