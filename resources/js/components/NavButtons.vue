<template>
    <div class="form-group">
        <button
            type="button"
            class="btn btn-secondary btn-control"
            v-if="stepId > 1"
            @click="prev"
        >
            Назад
        </button>

        <button
            type="button"
            class="btn btn-primary btn-control"
            v-if="stepId < 5"
            @click="next"
        >
            Продолжить
        </button>

        <button
            type="submit"
            class="btn btn-primary btn-control"
            v-if="stepId === 5"
            @click.prevent="submit"
        >
            Сохранить в pdf
        </button>

        <button
            type="button"
            class="btn btn-light btn-control"
            v-if="env === 'development'"
            @click="fill"
        >
            Заполнить
        </button>
    </div>
</template>

<script>
export default {
    props: {
        env: {
            type: String,
        },

        stepId: {
            type: Number,
        },
    },

    data() {
        return {};
    },

    methods: {
        next() {
            this.$emit("next");
        },
        prev() {
            this.$emit("prev");
        },
        fill() {
            this.$emit("fill");
        },
        submit($event) {
            this.$emit("submit", $event);
        },
    },
};
</script>

<style scoped>
</style>
