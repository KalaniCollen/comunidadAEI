<template>
    <section>
        <div class="card" v-for="(servicio, i) in servicios.data" :key="servicio.slug">
            <a :href="`/perfil-empresa/${servicio.empresa.slug_empresa}`" class="card__owner">
                <img :src="servicio.empresa.logo_empresa" class="card__owner-picture">
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
        <div class="section__footer w-100">
            <pagination :data="servicios" @pagination-change-page="getResults"></pagination>
        </div>
    </section>
</template>

<script type="text/javascript">
    export default {
        data() {
            return {
                servicios: {},
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
