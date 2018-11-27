<template>
    <section class="section section--cards">
        <div class="card" v-for="(producto, i) in productos" :key="producto.slug">
            <a href="#" class="card__owner">
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
    </section>
</template>

<script type="text/javascript">
    export default {
        data() {
            return {
                productos: []
            }
        },
        mounted() {
            axios.get('/v1/productos').then(response => (this.productos = response.data));
        },
        methods: {
            formatPrice(value) {
                let val = (value/1).toFixed(2).replace(',', '.');
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        }
    }
</script>
