<style>
    .viewer-backdrop {
        background-color: rgba(0,0,0,.8);
    }
    .vue_viewer_item {
        width: 310px;
        height: 180px;
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
        :zIndex="1004"
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
            }
            this.images.push(image);
        }
    }
}
</script>
