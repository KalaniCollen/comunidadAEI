<template>
    <div class="col-md-4 col-lg-4 pl-2 pr-2" style="overflow: auto;">
        <a :href=evento.url class="card card--mini card--mini-left" v-for="(evento, i) in eventos" :key="evento.id">
            <p class="card__date" :style="{ backgroundColor: evento.color }">{{ evento.start | moment("D") }} <span class="card__date-month">{{ evento.start | moment("MMM") }}</span> </p>
            <div class="card__body">
                <p class="card__title">{{ evento.title }}</p>
                <p class="card__time">{{ evento.start | moment('HH:mm') }} - {{ evento.end | moment('HH:mm') }} hrs.</p>
            </div>
        </a>
    </div>
</template>

<script type="text/javascript">
    export default {
        data() {
            return {
                eventos: []
            }
        },
        mounted() {
            axios.get('evento').then(response => (this.eventos = response.data));
        }
    }
</script>
