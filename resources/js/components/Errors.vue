<template>
    <div>
        <div class="alert alert-warning" v-if="labels.length">
            Не заполнено: <b>{{ labels.join(", ") }}</b>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        errors: {
            type: Object,
        },
    },

    data() {
        return {
            labels: [],
        };
    },

    watch: {
        errors() {
            this.labels = Object.values(this.errors);
        },
    },
};
</script>

<style scoped>
</style>
