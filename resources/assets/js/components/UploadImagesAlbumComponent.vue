<template>
    <div>
        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" v-on:vdropzone-sending="sendingEvent" v-on:vdropzone-success-multiple = "vSuccess"></vue-dropzone>
        <button class="btn btn--accent album-add__btn" @click="sendData" >
            <i class="btn__icon ion-md-send"></i>
            Subir Imagénes
        </button>
    </div>
</template>
<script type="text/javascript">
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import EventBus from '../event-bus';
export default {
    props: ['album'],
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            dropzoneOptions: {
                url: '/imagenes',
                paramName: "file",
                acceptedFiles: 'image/*',
                parallelUploads: 8,
                maxFiles: 8,
                maxFilesize: 2, // Tamaño máximo de archivo 2MB
                addRemoveLinks: true,
                autoProcessQueue: false,
                uploadMultiple: true,
                dictDefaultMessage: "<i class='ion-md-cloud-upload'></i> SUBIR IMAGENES",
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
            }
        }
    },
    methods: {
        sendingEvent (file, xhr, formData) {
            formData.append('id_album', this.album.id_album);
            formData.append('slug_album', this.album.slug_album);
        },
        vSuccess(files, response) {
            if(response.error == 1) {
                iziToast.error({
                    title: response.message,
                    timeout: 1500
                });
            } else {
                EventBus.$emit('images-added', response.imagenes);
                this.$refs.myVueDropzone.removeAllFiles();
                iziToast.success({
                    title: response.message,
                    timeout: 800
                });
            }

        },
        sendData() {
            this.$refs.myVueDropzone.processQueue();
        }
    }
}
</script>
