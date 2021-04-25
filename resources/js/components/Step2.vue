<template>
    <section>
        <h2>Описание случая</h2>

        <Errors :errors="errors"></Errors>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <v-select
                        :options="['Мужчина', 'Женщина']"
                        placeholder="Пол"
                        v-model="fields['Пол']"
                        :class="[
                            {
                                error: !!errors['step2[Пол]'],
                            },
                        ]"
                    ></v-select>
                    <input
                        class="out-of-screen"
                        name="step2[Пол]"
                        type="text"
                        v-model="fields['Пол']"
                        data-label="Пол"
                    />
                </div>
                <div class="col">
                    <input
                        name="step2[Инициалы]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step2[Инициалы]'],
                            },
                        ]"
                        placeholder="Инициалы"
                    />
                </div>
                <div class="col">
                    <date-picker
                        valueType="format"
                        type="year"
                        placeholder="Год рождения"
                        v-model="fields['Год рождения']"
                        :input-class="[
                            'mx-input',
                            {
                                error: !!errors['step2[Год рождения]'],
                            },
                        ]"
                    ></date-picker>
                    <input
                        name="step2[Год рождения]"
                        type="text"
                        class="out-of-screen"
                        v-model="fields['Год рождения']"
                        data-label="Год рождения"
                    />
                </div>
                <div class="col col-label">
                    <span v-if="fields.gender == 'Женщина'">
                        считает себя больной с
                    </span>
                    <span v-else> считает себя больным с </span>
                </div>
                <div class="col">
                    <v-select
                        :options="[
                            'января',
                            'февраля',
                            'марта',
                            'апреля',
                            'мая',
                            'июня',
                            'июля',
                            'августа',
                            'сентября',
                            'октября',
                            'ноября',
                            'декабря',
                        ]"
                        placeholder="Месяц"
                        v-model="fields['Болен с месяца']"
                        :class="[
                            {
                                error: !!errors['step2[Болен с месяца]'],
                            },
                        ]"
                    ></v-select>
                    <input
                        class="out-of-screen"
                        name="step2[Болен с месяца]"
                        type="text"
                        v-model="fields['Болен с месяца']"
                        data-label="Болен с месяца"
                    />
                </div>
                <div class="col">
                    <date-picker
                        valueType="format"
                        type="year"
                        placeholder="Год"
                        v-model="fields['Болен с года']"
                        :input-class="[
                            'mx-input',
                            {
                                error: !!errors['step2[Болен с года]'],
                            },
                        ]"
                    ></date-picker>
                    <input
                        name="step2[Болен с года]"
                        type="text"
                        class="out-of-screen"
                        v-model="fields['Болен с года']"
                        data-label="Болен с года"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-auto col-label">
                    когда в первые появились жалобы на
                </div>
                <div class="col">
                    <input
                        name="step2[Описание жалоб]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step2[Описание жалоб]'],
                            },
                        ]"
                        placeholder="Описание жалоб"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>
                Пациент обратился к врачу по месту жительства. При обследовании
                было выявлено:
            </label>
            <DiagnosticTest
                v-for="(test, index) in fields['Обследования']"
                :errors="errors"
                :stepId="2"
                :index="index"
                :test="test"
                :key="test.uid"
                @remove="removeTest(index)"
                @update="updateTest(index, $event)"
            ></DiagnosticTest>
        </div>

        <div class="form-group">
            <button
                type="button"
                class="btn btn-primary btn-control"
                @click="addTest()"
            >
                Добавить
            </button>
        </div>

        <GroupOfTests :errors="errors" :stepId="2"></GroupOfTests>

        <div class="p-2"></div>

        <BloodTest :errors="errors" :stepId="2"></BloodTest>

        <div class="p-4"></div>

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
import GroupOfTests from "./GroupOfTests";
import DiagnosticTest from "./DiagnosticTest";
import BloodTest from "./BloodTest";
import mixins from "./mixins";

export default {
    mixins: [mixins],

    components: { GroupOfTests, DiagnosticTest, BloodTest },

    props: {
        env: {
            type: String,
        },
    },

    data() {
        return {
            errors: {},
            stepId: 2,
            fields: {
                Пол: "",
                "Год рождения": "",
                "Болен с месяца": "",
                "Болен с года": "",

                Обследования: [],
            },
        };
    },

    methods: {
        addTest() {
            this.fields["Обследования"].push({
                uid: _.uniqueId(),
                Дата: "",
                Тип: "",
                Объект: "",
                "Описание и заключение": "",
            });
        },

        removeTest(index) {
            this.fields["Обследования"].splice(index, 1);
        },

        updateTest(index, fields) {
            this.fields["Обследования"][index] = fields;
        },

        fill() {
            if (process.env.NODE_ENV === "development") {
                $('[name="step2[Пол]"]').val("Мужчина");
                $('[name="step2[Инициалы]"]').val("Навальный А.А.");
                $('[name="step2[Год рождения]"]').val("1976");
                $('[name="step2[Болен с месяца]"]').val("августа");
                $('[name="step2[Болен с года]"]').val("2020");
                $('[name="step2[Описание жалоб]"]').val("Онемение рук и ног");
                $('[name="step2[Обследования][0][Дата]"]').val("2020-10-07");
                $('[name="step2[Обследования][0][Тип]"]').val("МСКТ");
                $('[name="step2[Обследования][0][Объект]"]').val(
                    "головного мозга"
                );
                $('[name="step2[Обследования][0][Описание и заключение]"]').val(
                    "Постоянно ухудшается"
                );
                $('[name="step2[Рентгенография][Дата]"]').val("2020-10-07");
                $('[name="step2[Рентгенография][Описание и заключение]"]').val(
                    "Состояние ухудшается"
                );
                $('[name="step2[Сцинтиграфия][Дата]"]').val("2020-10-07");
                $('[name="step2[Сцинтиграфия][Описание и заключение]"]').val(
                    "Онемение рук и ног"
                );
                $('[name="step2[Биопсия][Дата]"]').val("2020-10-07");
                $('[name="step2[Биопсия][Объект]"]').val("Пищевода");
                $('[name="step2[Биопсия][Описание и заключение]"]').val(
                    "Раздражение слизистых"
                );
                $('[name="step2[ОАК][ER]"]').val(_.random(1.2, 5.6).toFixed(2));
                $('[name="step2[ОАК][Hb]"]').val(_.random(1.2, 5.6).toFixed(2));
                $('[name="step2[ОАК][Le]"]').val(_.random(1.2, 5.6).toFixed(2));
                $('[name="step2[ОАК][Tr]"]').val(_.random(1.2, 5.6).toFixed(2));
                $('[name="step2[ОАК][СОЭ]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][п/я]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][с/я]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Ly]"]').val(_.random(1.2, 5.6).toFixed(2));
                $('[name="step2[ОАК][Mo]"]').val(_.random(1.2, 5.6).toFixed(2));
                $('[name="step2[ОАК][Bas]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Эо]"]').val(_.random(1.2, 5.6).toFixed(2));
                $('[name="step2[ОАК][АсАт][Значение]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][АсАт][N]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][АлАт][Значение]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][АлАт][N]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][ЛДГ][Значение]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][ЛДГ][N]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Скорректированный Ca2+][Значение]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Скорректированный Ca2+][N]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Мочевина крови][Значение]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Мочевина крови][N]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Креатинин крови][Значение]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Креатинин крови][N]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Общий белок][Значение]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Общий белок][N]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Миелоциты]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );
                $('[name="step2[ОАК][Метамиел]"]').val(
                    _.random(1.2, 5.6).toFixed(2)
                );

                this.triggerInputEvent();
            }
        },
    },

    beforeMount() {
        this.addTest();
    },
};
</script>

<style scoped>
</style>
