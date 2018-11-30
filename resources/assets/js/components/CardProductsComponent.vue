<template>
    <section class="row no-gutters d-flex justify-content-center">
        <div class="card col-md-10 col-lg-5 ml-2 mr-2" v-for="(producto, i) in productos.data" :key="producto.slug">
            <a :href="`/perfil-empresa/${producto.empresa.slug_empresa}`" class="card__owner">
                <img :src="producto.empresa.logo_empresa" alt="" class="card__owner-picture">
                <p class="card__owner-name">{{ producto.empresa.nombre_empresa }}</p>
            </a>
            <img :src="`storage/catalogos_img/${producto.imagen}`" alt="" class="card__image">
            <div class="card__body">
                <p class="card__title">{{ producto.nombre }}</p>
                <p class="card__date">{{ producto.created_at | moment("d MMMM Y") }}</p>
                <p class="card__description">{{ producto.descripcion }}</p>
            </div>
            <div class="card__footer">
                <a :href="`productos/${producto.slug}`" class="btn btn--accent">Ver más</a>
            </div>
        </div>
        <div class="section__footer">
            <pagination :data="productos" @pagination-change-page="getResults"></pagination>
        </div>
    </section>
</template>

<script type="text/javascript">
    export default {
        data() {
            return {
                productos: {}
            }
        },
        mounted() {
            this.getResults();
        },
        methods: {
            getResults(page = 1) {
                axios.get('/v1/productos?page=' + page).then(response => (this.productos = response.data));
            },
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace(',', '.');
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        }
    }
</script>
