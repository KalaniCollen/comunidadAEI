<template>
    <section class="section section--cards">
        <div class="card" v-for="(servicio, i) in servicios" :key="servicio.slug">
            <div class="card__owner">
                <img src="https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/012016/untitled-1_77.png?itok=lw7cADiJ" class="user__picture card-user--picture">
                <p class="user__username card-user--username">{{ servicio.user.name }}</p>
            </div>
            <div class="card__image">
                <div v-bind:style="{ backgroundImage: 'url(/storage/catalogos_img/' + servicio.imagen + ')' }" class="card__image-img"></div>
            </div>
            <div class="card__body">
                <p class="card__title">{{ servicio.nombre }}</p>
                <p class="card__date">{{ servicio.created_at | moment("D MMMM YYYY") }}</p>
                <p class="card__content">{{ servicio.descripcion }}</p>
            </div>
            <div class="card__actions card__actions--space">
                <a :href="`servicios/${servicio.slug}`" class="btn btn--accent">Ver más</a>
                <a :href="`servicios/${servicio.slug}/contact`">Contactar</a>
            </div>
        </div>
    </section>
</template>

<script type="text/javascript">
    const moment = require('moment')
    require('moment/locale/es')

    Vue.use(require('vue-moment'), {
        moment
    });

    export default {
        data() {
            return {
                servicios: []
            }
        },
        mounted() {
            axios.get('/v1/servicios').then(response => (this.servicios = response.data));
        }
    }
</script>
