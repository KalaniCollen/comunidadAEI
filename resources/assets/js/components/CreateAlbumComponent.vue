<template lang="html">
    <section>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalAlbum" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear nuevo album</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="group">
                            <label for="nombre" class="label">Nombre del album</label>
                            <input type="text" id="js-in-create" value="" class="input">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn--accent" id="js-btn-create" @click="createAlbum()">Crear album</button>
                        <button class="btn" id="js-btn-cancel" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="section__header">
            <h1 class="section__title">Albums</h1>
            <a href="#" data-toggle="modal" data-target="#modal" class="btn btn--accent" id="js-create-album"><i class="btn__icon ion-md-add"></i>Nuevo album</a>
        </div>
    </section>
</template>
<script>
import EventBus from '../event-bus';
export default {
    mounted() {
        $('#modal').on('hidden.bs.modal', function() {
            $('#js-in-create').val('');
        });
    },
    methods: {
        createAlbum() {
            axios.post('/albums', {
                nombre: $('#js-in-create').val()
            }).then(function(response) {
                $('#modal').modal('hide');
                $('#js-in-create').val('');
                iziToast.success({
                    title: 'Ok!',
                    icon: 'ion-md-done-all',
                    message: response.data.message,
                    displayMode: 1,
                });
                EventBus.$emit('album-added', response.data.album);
            });
        }
    }
}
</script>
