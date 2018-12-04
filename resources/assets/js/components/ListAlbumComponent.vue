<template lang="html">
    <div>
        <div class="card" v-for="album of albums" :key="album.id_album">
            <a class="card card--link" :href="`${album.slug_album}`">
                <div class="card__body">
                    <p class="card__title">{{ album.nombre }}</p>
                </div>
            </a>
            <div class="card__footer">
                <a href="#" id="js-btn-edit-album" class="btn btn--accent" data-toggle="modal" data-target="#modal-edit"><i class="btn__icon ion-md-create"></i> Editar</a>

                <a href="#" class="btn js-btn-delete-album" @click.prevent="destroyAlbum(album.slug_album, album.nombre)"><i class="btn__icon ion-md-trash"></i> Eliminar</a>
            </div>
            <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Modal">Editar album</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="nombre" class="label">Nuevo nombre del album</label>
                            <input type="text" name="nombre" id="js-new-name" class="input">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click.prevent="updateAlbum(album.slug_album)">Actualizar album</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import EventBus from '../event-bus';
export default {
    data() {
        return {
            albums: []
        }
    },
    created() {
        EventBus.$on('album-added', data => {
            this.albums.push(data);
        });
        $('#modal-edit').on('hide.bs.modal', function(e) {
            $('#js-new-name').val('');
        });
    },
    mounted() {
        axios.get('/albums').then(response => this.albums = response.data);
    },
    methods: {
        updateAlbum(slug) {
            let nombre = $('#js-new-name').val();
            console.log(`/albums/${slug}`);
            axios.put(`/albums/${slug}`, {
                name: nombre
            }).then(response => {
                $('#modal-edit').modal('hide');

                iziToast.success({
                    title: response.data,
                    timeout: 800,
                    displayMode: 'once',
                    onClosing: function() {
                        location.reload();
                    }
                });
            });
        },
        destroyAlbum(slug, nombre) {
            iziToast.question({
                backgroundColor: '#ef5350',
                titleColor: '#fff',
                icon: 'ion-md-trash',
                iconColor: '#fff',
                position: 'center',
                title: `¿Desea eliminar el album ${nombre}?`,
                buttons: [
                    [`<button style="color: #fff;">Si</button>`, function(instance, toast) {
                        axios.delete(`${slug}`, {
                            slug: slug
                        }).then(response => {
                            instance.hide({}, toast);
                            iziToast.success({
                                title: response.data.message,
                                displayMode: 1,
                            });
                            location.reload();
                        }).catch(error => {
                            iziToast.error({
                                title: error.message,
                                displayMode: 1,
                            });
                        });
                    }],
                    [`<button style="color: #fff;">No</button>`, function(instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }]
                ]
            });

        }
    }
}
</script>
