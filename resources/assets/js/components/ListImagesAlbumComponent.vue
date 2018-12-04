<style scoped>
    .vue_viewer {
        display: flex;
        flex-flow: row wrap;
        justify-content: space-around;
        align-items: center;
    }


    .card-image__container {
        width: 100%;
        height: 180px;
        overflow: hidden;
        margin-bottom: 8px;
    }
    .card-image {
        width: 310px;
        height: 280px;
        display: flex;
        flex-flow: column wrap;
    }
    .card-image__img {
        width: 100%;
    }

    @media screen and (max-width: 600px) {
        .vue_viewer {
            flex-direction: column;
        }
    }
</style>
<template>
    <vue-viewer
        :images="images"
        v-if="images.length"
        :zIndex="1004"
    >
    <div class="card-image" v-for="image in images">
        <div class="card-image__container">
            <img class="card-image__img" :src="image.url">
        </div>
        <button class="btn btn--accent" @click="deleteImage(image.id)">Eliminar imagen</button>
    </div>
    </vue-viewer>
</template>
<script type="text/javascript">
import VueViewer from 'vue-viewerjs';
import EventBus from '../event-bus';

export default {
    props: ['imagenes'],
    components: {
        VueViewer
    },
    data() {
        return {
            images: []
        }
    },
    created() {
        try {
            EventBus.$on('images-added', data => {
                for (let imagen of data) {
                    console.log(data);
                    let image = {
                        url: imagen.direccion,
                        id: imagen.id_imagen
                    }
                    this.images.push(image);
                }
            });
        } catch(e) {
            console.log(e);
        }
    },
    mounted() {
        for (let imagen of this.imagenes) {
            let image = {
                url: imagen.direccion,
                id: imagen.id_imagen
            }
            this.images.push(image);
        }
    },
    methods: {
        deleteImage(id) {
            axios.delete(`/imagenes/${id}`).then(response => {
                iziToast.success({
                    title: "Imagen eliminada correctamente!",
                    timeout: 800,
                    onClosing: function() {
                        location.reload();
                    }
                });
            });
        }
    }
}
</script>
