<template>
    <section>
        <h2>Сведения о враче</h2>

        <Errors :errors="errors"></Errors>

        <div class="form-group">
            <div class="row">
                <div class="col-10">
                    <input
                        name="step1[Название клинического случая]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors[
                                    'step1[Название клинического случая]'
                                ],
                            },
                        ]"
                        placeholder="Название клинического случая"
                    />
                </div>
                <div class="col-2">
                    <date-picker
                        valueType="format"
                        placeholder="Дата"
                        v-model="fields['Дата']"
                        :input-class="[
                            'mx-input',
                            {
                                error: !!errors['step1[Дата]'],
                            },
                        ]"
                    ></date-picker>
                    <input
                        name="step1[Дата]"
                        class="out-of-screen"
                        type="text"
                        v-model="fields['Дата']"
                        data-label="Дата"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <input
                        name="step1[Фамилия]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step1[Фамилия]'],
                            },
                        ]"
                        placeholder="Фамилия"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Имя]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step1[Имя]'],
                            },
                        ]"
                        placeholder="Имя"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Отчество]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step1[Отчество]'],
                            },
                        ]"
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
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step1[Должность]'],
                            },
                        ]"
                        placeholder="Должность"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Место работы]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step1[Место работы]'],
                            },
                        ]"
                        placeholder="Место работы"
                    />
                </div>
                <div class="col-4">
                    <input
                        name="step1[Город]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step1[Город]'],
                            },
                        ]"
                        placeholder="Город"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea
                name="step1[Комментарий]"
                rows="5"
                :class="[
                    'form-control',
                    {
                        error: !!errors['step1[Комментарий]'],
                    },
                ]"
                placeholder="Комментарий"
            ></textarea>
        </div>

        <div class="p-3"></div>

        <NavButtons
            :env="env"
            :stepId="stepId"
            @prev="prev"
            @next="next"
            @fill="fill"
        ></NavButtons>
    </section>
</template>

<script>
import $ from "jquery";
import mixins from "./mixins";

export default {
    mixins: [mixins],

    props: {
        env: {
            type: String,
        },
    },

    data() {
        return {
            errors: {},
            stepId: 1,
            fields: {
                Дата: "",
            },
        };
    },

    methods: {
        fill() {
            if (process.env.NODE_ENV === "development") {
                $('[name="step1[Название клинического случая]"]').val(
                    "Отравления боевым ядом «Новичок» пациента 44 лет"
                );
                $('[name="step1[Дата]"]').val("2021-03-10");
                $('[name="step1[Фамилия]"]').val("Исаева");
                $('[name="step1[Имя]"]').val("Светлана");
                $('[name="step1[Отчество]"]').val("Николаевна");
                $('[name="step1[Должность]"]').val(
                    "к.н.м., доцент общей и детской урологии-андрологии"
                );
                $('[name="step1[Место работы]"]').val(
                    "ФГБОУ ВО СибГМУ М3 России"
                );
                $('[name="step1[Город]"]').val("Новосибирск");
                $('[name="step1[Комментарий]"]').val(
                    "Состояние здоровья политика, которому еще недавно чудом удалось выжить после отравления боевым ядом «Новичок», постоянно ухудшается."
                );

                this.triggerInputEvent();
            }
        },
    },
};
</script>

<style scoped>
</style>
