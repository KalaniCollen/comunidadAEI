<template>
    <section class="section section--cards">
        <div class="card" v-for="(producto, i) in productos" :key="producto.slug">
            <div class="card__owner">
                <img src="https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/012016/untitled-1_77.png?itok=lw7cADiJ" class="user__picture card-user--picture">
                <p class="user__username card-user--username">{{ producto.user.name }}</p>
            </div>
            <div class="card__image">
                <div v-bind:style="{ backgroundImage: 'url(/storage/catalogos_img/' + producto.imagen + ')' }" class="card__image-img"></div>
            </div>
            <div class="card__body">
                <p class="card__title">{{ producto.nombre }}</p>
                <p class="card__date">{{ producto.created_at | moment("D MMMM YYYY")}}</p>
                <p class="card__content">{{ producto.descripcion }}</p>
            </div>
            <div class="card__actions card__actions--space">
                <a :href="`productos/${producto.slug}`" class="btn btn--accent">Ver más</a>
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
                productos: []
            }
        },
        mounted() {
            axios.get('/v1/productos').then(response => (this.productos = response.data));
        }
    }
</script>
