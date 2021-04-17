<template>
    <section>
        <h2>Сведения о враче</h2>

        <div class="form-group">
            <div class="row">
                <div class="col-10">
                    <input
                        name="step1[Название клинического случая]"
                        type="text"
                        class="form-control"
                        placeholder="Название клинического случая"
                    />
                </div>
                <div class="col-2">
                    <date-picker
                        :input-attr="{ name: 'step1[Дата]' }"
                        valueType="format"
                        placeholder="Дата"
                    ></date-picker>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <input
                        name="step1[Фамилия]"
                        type="text"
                        class="form-control"
                        placeholder="Фамилия"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Имя]"
                        type="text"
                        class="form-control"
                        placeholder="Имя"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Отчество]"
                        type="text"
                        class="form-control"
                        placeholder="Отчество"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <input
                        name="step1[Должность]"
                        type="text"
                        class="form-control"
                        placeholder="Должность"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Место работы]"
                        type="text"
                        class="form-control"
                        placeholder="Место работы"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Город]"
                        type="text"
                        class="form-control"
                        placeholder="Город"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea
                name="step1[Комментарий]"
                rows="5"
                class="form-control"
                placeholder="Комментарий"
            ></textarea>
        </div>

        <div class="p-3"></div>

        <div class="form-group">
            <button
                type="button"
                class="btn btn-primary btn-control"
                @click="next()"
            >
                Продолжить
            </button>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            fields: {},
        };
    },

    methods: {
        next() {
            this.$emit("next", this.fields);
        },
    },
};
</script>

<style scoped>
</style>
