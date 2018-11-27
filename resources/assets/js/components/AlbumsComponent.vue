<template lang="html">
    <div>
        <div class="card" v-for="album of albums" :key="album.id_album">
            <a class="card card--link" :href="`${album.slug_album}`">
                <!-- <p>{{ album.imagenes }}</p> -->
                <!-- <div class="card__image" :style="backgroundImage: url(album.imagenes);"></div> -->
                <div class="card__body">
                    <p class="card__title">{{ album.nombre }}</p>
                </div>
            </a>
            <div class="card__footer">
                <a href="#" id="js-btn-edit-album" class="btn btn--accent" data-izimodal-open="#js-edit-album-modal"><i class="btn__icon ion-md-create" @click.prevent="updateAlbum(album.slug_album)"></i> Editar</a>

                <a href="#" class="btn js-btn-delete-album" @click.prevent="destroyAlbum(album.slug_album, album.nombre)"><i class="btn__icon ion-md-trash"></i> Eliminar</a>
            </div>
            <!-- <p>{{ album.imagenes[0].direccion }}</p> -->
        </div>
    </div>
</template>

<script>
import EventBus from '../event-bus';
export default {
    props: ['albumes'],
    data() {
        return {
            albums: []
        }
    },
    created() {
        EventBus.$on('album-added', data => {
            this.albums.push(data);
        });
    },
    mounted() {
        axios.get('/albums').then(response => this.albums = response.data);
    },
    methods: {
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
                            iziToast.success({
                                title: response.data.message
                            });
                            // axios.get('/albums').then(response => this.albums = response.data);
                        }).catch(error => {
                            iziToast.error({
                                title: error.message
                            });
                        });
                    }]
                ]
            });

        }
    }
}
</script>
