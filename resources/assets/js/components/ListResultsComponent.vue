<template lang="html">
    <div class="col-md-6" v-for="(result, index) in results">
        <p>{{ result }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            results: []
        }
    },
    mounted() {
        axios.get('/search').then(res => {
            console.log(res);
            this.results = res.data;
        });
    }
}
</script>

<style lang="css">
</style>
