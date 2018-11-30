<template lang="html">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <vue-croppie
                        ref="croppieRef"
                        :boundary="{ width: 200, height: 200}"
                        :viewport="{ width: 180, height: 180, type: 'circle'}"
                        :enableResize='false'
                        :mouseWheelZoom='true'
                        :enforceBoundary='true'

                    ></vue-croppie>
                    <img :src="cropped">
                    <div class="group">
                        <p class="w-100 label">Imagen de perfil</p>
                        <label for="js-input-file" class="file">
                            <i class="file__icon ion-md-cloud-upload"></i>
                            <input type="file" class="input" name="imagen" id="js-input-file" accept="image/*" size="2000000">
                        </label>
                        <span class="file__text" id="js-file-text"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="crop()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cropped: '',
        }
    },
    mounted() {
        this.$refs.croppieRef.bind({
            url: 'https://ae01.alicdn.com/kf/HTB1zDhuIpXXXXXPaXXXq6xXFXXXz/Hombre-guapo-2015-Hot-venta-esmoquin-del-novio-novio-trajes-de-novio-traje-Jacket-Pants-Tie.jpg_640x640.jpg',
        })
    },
    methods: {
        bind() {
            this.$refs.croppieRef.bind({
                url: url,
            });
        },
        crop() {
            let options = {
                format: 'jpeg',
                circle: true
            }
            this.$refs.croppieRef.result(options, (output) => {
                this.cropped = output;
            });
        }
    }
}
</script>
