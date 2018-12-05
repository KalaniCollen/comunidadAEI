<template>
    <section class="section w-100">
        <div class="section__header">
            <h1 class="section__title">Servicios</h1>
        </div>
        <div class="row no-gutters">
            <div class="col-md-5 mr-md-4 ml-md-5 col-lg-3 mr-lg-3 ml-lg-3" v-for="(servicio, i) in servicios.data" :key="servicio.slug">

                <div class="card" >
                    <a :href="`/perfil-empresa/${servicio.empresa.slug_empresa}`" class="card__owner">
                        <img :src="servicio.empresa.logo_empresa" alt="" class="card__owner-picture">
                        <p class="card__owner-name">{{ servicio.empresa.nombre_empresa }}</p>
                    </a>
                    <div class="card__image" :style="{ backgroundImage: 'url(/storage/catalogos_img/' + servicio.imagen + ')' }"></div>
                    <div class="card__body">
                        <p class="card__title">{{ servicio.nombre }}</p>
                        <p class="card__date">{{ servicio.created_at | moment("D MMMM YYYY") }}</p>
                        <p class="card__description">{{ servicio.descripcion }}</p>
                    </div>
                    <div class="card__footer">
                        <a :href="`servicios/${servicio.slug}`" class="btn btn--accent">Ver más</a>
                        <a :href="`servicios/${servicio.slug}/contact`" class="btn btn--ghost btn--ghost-transparent">Contactar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__footer w-100">
            <pagination :data="servicios" @pagination-change-page="getResults"></pagination>
        </div>
    </section>
</template>

<script type="text/javascript">
    export default {
        data() {
            return {
                servicios: {}
            }
        },
        mounted() {
            this.getResults();
        },
        methods: {
            getResults(page = 1) {
                axios.get('/v1/servicios?page=' + page).then(response => (this.servicios = response.data));
            }
        }
    }
</script>
