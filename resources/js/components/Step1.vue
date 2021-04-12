<template>
    <div>
        <section>
            <h2>Сведения о враче</h2>

            <div class="form-group">
                <div class="row">
                    <div class="col-10">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Название клинического случая"
                            v-model="fields.nameOfTheClinicCase"
                        />
                    </div>
                    <div class="col-2">
                        <date-picker
                            placeholder="Дата"
                            v-model="fields.date"
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
                            v-model="fields.name"
                        />
                    </div>
                    <div class="col-4">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Имя"
                            v-model="fields.surname"
                        />
                    </div>
                    <div class="col-4">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Отчество"
                            v-model="fields.patronymic"
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
                            v-model="fields.position"
                        />
                    </div>
                    <div class="col-4">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Место работы"
                            v-model="fields.job"
                        />
                    </div>
                    <div class="col-4">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Город"
                            v-model="fields.city"
                        />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea
                    rows="10"
                    class="form-control"
                    placeholder="Комментарий"
                    v-model="fields.comment"
                ></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" @click="next()">
                    Продолжить
                </button>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fields: {
                nameOfTheClinicCase: "",
                date: "",

                surname: "",
                name: "",
                patronymic: "",

                position: "",
                job: "",
                city: "",

                comment: "",
            },
        };
    },

    methods: {
        next() {
            this.$emit("next");
        },
    },
};
</script>

<style scoped>
</style>
