let crImagen = document.getElementById('croppie-picture');
let croppie = new Croppie(crImagen, {
    boundary: { width: 260, height: 260 },
    viewport: { width: 180, height: 180, type: 'circle' },
});

$('#js-input-file').on('change', function(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        croppie.bind({
            url: event.target.result
        });
    }
    reader.readAsDataURL(this.files[0]);
});

$('#js-btn-cancel').on('click', function() {
    $('#modal-picture').modal('hide');
});

$('#js-btn-save').on('click',function() {
    let image = croppie.result({
        type: 'base64',
        size: 'viewport',
        circle: true
    }).then(function(response) {
        axios.put('{{ route('perfil-usuario.save-image', $perfil_usuario->slug_usuario) }}' ,{
            imagen: response
        }).then(data => {
            console.log(data);
            document.getElementById('croppie-picture').src = response;
            $('#modal-picture').modal('hide');
            iziToast.success({
                title: data.data,
                timeout: 1500,
                displayMode: 'once',
                onClosing: function() {
                    location.reload();
                }
            });
        });
    });
});

$('#modal-picture').on('shown.bs.modal', function(){
    croppie.bind({
        url: crImagen.src
    });
});
