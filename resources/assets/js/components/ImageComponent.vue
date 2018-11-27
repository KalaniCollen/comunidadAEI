<style>
    .viewer-backdrop {
        background-color: rgba(0,0,0,.9);
    }
    .vue_viewer_item {
        width: 310px;
        overflow: hidden;
    }

    .vue_viewer_item img {
        width: 100% !important;
    }
</style>
<template>
    <vue-viewer
        :images="images"
        v-if="images.length"
        :zIndex="1002"
    ></vue-viewer>
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
        EventBus.$on('images-added', data => {
            for (let imagen of data) {
                let image = {
                    url: imagen.direccion,
                    title: "Hola"
                }
                this.images.push(image);
            }
        });
    },
    mounted() {
        for (let imagen of this.imagenes) {
            let image = {
                url: imagen.direccion,
                title: "Hola"
            }
            this.images.push(image);
        }
    }
}

</script>
