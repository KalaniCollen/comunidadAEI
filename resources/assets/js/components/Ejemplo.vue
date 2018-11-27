<template lang="html">
    <section>
        <div id="js-create-album-modal" class="iziModal">
            <div class="group">
                <label for="nombre" class="label">Nombre del album</label>
                <input type="text" id="js-in-create" value="" class="input">
            </div>
            <button class="btn btn--accent" id="js-btn-create">Crear album</button>
            <button class="btn" data-izimodal-close="" data-izimodal->Cancelar</button>
        </div>

        <div class="section__header">
            <h1 class="section__title">Albums</h1>
            <a href="#" data-izimodal-open="#js-create-album-modal" class="btn btn--accent" id="js-create-album"><i class="btn__icon ion-md-add"></i>Nuevo album</a>
        </div>
    </section>
</template>
<script>
import EventBus from '../event-bus';
export default {
    mounted() {
        $('#js-create-album-modal').iziModal({
            title: 'Nuevo album',
            icon: 'ion-md-create',
            padding: '1em',
            headerColor: '#567',
            zindex: 1003,
            onOpened: function(modal) {
                $('#js-btn-create').on('click', function(el) {
                    let name = $('#js-in-create').val();
                    axios.post('/albums', {
                        nombre: name
                    }).then(function(response) {
                        $('#js-in-create').val('');
                        $('#js-create-album-modal').iziModal('close');
                        iziToast.success({
                            title: 'Ok!',
                            icon: 'ion-md-done-all',
                            message: response.data.message,
                            position: 'topRight'
                        });
                        EventBus.$emit('album-added', response.data.album);
                    }).catch(function(error) {
                        iziToast.error({
                            title: 'Error!',
                            message: error.message,
                            position: 'topRight'
                        });
                    });
                });
            }
        });
    }
}
</script>
