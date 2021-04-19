<template>
    <div>
        <div class="alert alert-warning" v-if="errors.length">
            Не заполнено: <b>{{ errors.join(", ") }}</b>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        errors: {
            type: Array,
        },
    },

    data() {
        return {};
    },
};
</script>

<style scoped>
</style>
