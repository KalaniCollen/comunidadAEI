/*
    URL fija del recurso
*/
const URL = "/album";
let albumName = $('#js-album-name');

// Crear un nuevo album
$('#js-album-create').on('click', function() {
    let album = albumName.val();
    let token = $('#js-album-token').val();
    ajaxData(URL, 'POST', token, {nombre: album}, function() {
        albumName.val('');
        location.reload();
    });
});

$('.js-album-delete').on('click', function() {
    let token = $(this).data('token');
    let slug = $(this).data('slug');
    if (confirm(`¿Desea eliminar el album ${slug}?`)) {
        ajaxData(`${URL}/${slug}`, 'DELETE', token, {slug: slug}, location.reload());
    } else {
        return;
    }
});
