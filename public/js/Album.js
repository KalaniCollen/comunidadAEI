/*
    URL fija del recurso
*/
const URL = "/albums";
const token = $('meta[name="csrf-token"]').attr('content');
$('#js-create-album-modal').iziModal({
    title: 'Nuevo album',
    icon: 'ion-md-create',
    padding: '1em',
    headerColor: '#567',
    zindex: 1003,
    onOpened: function(modal) {
        $('#js-btn-create').on('click', function(el) {
            axios.post('/albums', {
                nombre: this.value
            }).then(function(response) {
                this.nombre = '';
                console.log(respo);
                $('#js-create-album-modal').iziModal('close');
                iziToast.success({
                    title: 'Ok!',
                    icon: 'ion-md-done-all',
                    message: response.data.message,
                    position: 'topRight'
                });
                // EventBus.$emit('images-added', response.al);
            }).catch(function(error) {
                console.log(error);
                iziToast.error({
                    title: 'Error!',
                    message: error,
                    position: 'topRight'
                });
            });
        });
    }
});
