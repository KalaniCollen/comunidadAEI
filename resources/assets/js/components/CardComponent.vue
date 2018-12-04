<template lang="html">
    <section>
        <div class="card">
            <a :href="company-href" class="card__owner">
                <img :src="company-logo" class="card__owner-picture">
                <p class="card__owner-name">{{ company-name }}</p>
            </a>
            <div class="card__image" :style="{ backgroundImage: 'url(' + image + ')' }"></div>
            <div class="card__body">
                <p class="card__title">{{ title }}</p>
                <p class="card__date">{{ date }}</p>
                <p class="card__description">{{ description }}<p>
            </div>
            <div class="card__footer">
                <slot name="footer"></slot>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: [
        'objects'
    ],
    data() {
        return {
            objs: []
        }
    },
    mounted() {
        this.objs = this.objects;
    }
}
</script>

<style lang="css">
</style>
