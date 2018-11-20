/*
    URL fija del recurso
*/
const URL = "/album";

$('#js-album-new').on('click', function(){
    $.alertable.prompt('Nombre del album')
    .then(function(data){
        let album = data.value;
        let token = $('#js-album-token').val();
        ajaxData(URL, 'POST', token, {nombre: album}, function() {
            location.href = URL;
        });
    }, function() {
        console.log('cancelado');
    });
});

$('.js-album-delete').on('click', function() {
    let token = $(this).data('token');
    let slug = $(this).data('slug');
    let name = $(this).data('name');
    $.alertable
    .confirm(`¿Desea eliminar el album ${name}?`)
    .then(function() {
        ajaxData(`${URL}/${slug}`, 'DELETE', token, {slug: slug}, function() {
            location.href = URL;
        });
    });
});

$('.js-album-edit').on('click', function() {
    let token = $(this).data('token');
    let slug = $(this).data('slug');
    $.alertable.prompt('Nuevo nombre del album')
    .then(function(data){
        let album = data.value;
        ajaxData(`${URL}/${slug}`, 'PUT', token, {nombre: album}, function() {
            location.href = URL;
        });
    }, function() {
        console.log('cancelado');
    });
});
