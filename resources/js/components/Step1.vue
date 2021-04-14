<template>
    <section>
        <h2>Сведения о враче</h2>

        <div class="form-group">
            <div class="row">
                <div class="col-10">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Название клинического случая"
                        v-model="fields['Название клинического случая']"
                    />
                </div>
                <div class="col-2">
                    <date-picker
                        valueType="format"
                        placeholder="Дата"
                        v-model="fields['Дата']"
                    ></date-picker>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Фамилия"
                        v-model="fields['Фамилия']"
                    />
                </div>
                <div class="col-4">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Имя"
                        v-model="fields['Имя']"
                    />
                </div>
                <div class="col-4">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Отчество"
                        v-model="fields['Отчество']"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Должность"
                        v-model="fields['Должность']"
                    />
                </div>
                <div class="col-4">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Место работы"
                        v-model="fields['Место работы']"
                    />
                </div>
                <div class="col-4">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Город"
                        v-model="fields['Город']"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea
                rows="5"
                class="form-control"
                placeholder="Комментарий"
                v-model="fields['Комментарий']"
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
            fields: {
                "Название клинического случая": "",
                Дата: "",

                Фамилия: "",
                Имя: "",
                Отчество: "",

                Должность: "",
                "Место работы": "",
                Город: "",

                Комментарий: "",
            },
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
