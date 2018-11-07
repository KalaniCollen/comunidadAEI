<template lang="html">
    <div class="header">
        <div class="header__container" v-for="empresa in empresas" :key="empresa.slug">
            <h2 class="header__title">{{ empresa.Nombre_Empresa }}</h2>
            <img :src="empresa.Logo_Empresa" alt="" class="header__img">
            <p class="header__content">{{ empresa.Descripcion }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                empresas: [
                    {
                        Nombre_Empresa: "Asociación de Empresarios de Iztapalapa 50 AÑOS",
                        Logo_Empresa: "https://ovejas.com.mx/wp-content/uploads/2017/06/Delta.jpg",
                        Descripcion: "La Asociación de Empresarios de Iztapalapa A.C fue constituida en el año de 1968."
                    },
                    {
                        Nombre_Empresa: "Calentadores DELTA",
                        Logo_Empresa: "https://ovejas.com.mx/wp-content/uploads/2017/06/Delta.jpg",
                        Descripcion: "Nuestros calentadores de agua y generadores de vapor están fabricados cumpliendo con los más altos niveles de calidad, 100% con mano de obra mexicana. Pensando siempre en el bienestar y la salud de nuestros clientes."
                    }
                ]
            }
        },
        methods: {
            refreshSlider() {
            }
        },
        mounted() {
            this.refreshSlider();
        }

        // setTimeout(function() {
        //     console.log("Hola");
        // }, 1200);
        // mounted() {
        //     axio.get('perfil_empresa.index')
        //     .then(res => (this.empresas = this.res.data))
        // }
    }
</script>
