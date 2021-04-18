<template>
    <section>
        <h2>Описание случая</h2>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <v-select
                        :options="['Мужчина', 'Женщина']"
                        placeholder="Пол"
                        v-model="fields['Пол']"
                    ></v-select>
                    <input
                        name="step2[Пол]"
                        type="hidden"
                        v-model="fields['Пол']"
                    />
                </div>
                <div class="col">
                    <input
                        name="step2[Инициалы]"
                        type="text"
                        class="form-control"
                        placeholder="Инициалы"
                    />
                </div>
                <div class="col">
                    <date-picker
                        :input-attr="{ name: 'step2[Год рождения]' }"
                        valueType="format"
                        type="year"
                        placeholder="Год рождения"
                    ></date-picker>
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
                    ></v-select>
                    <input
                        name="step2[Болен с месяца]"
                        type="hidden"
                        v-model="fields['Болен с месяца']"
                    />
                </div>
                <div class="col">
                    <date-picker
                        :input-attr="{ name: 'step2[Болен с года]' }"
                        valueType="format"
                        type="year"
                        placeholder="Год"
                    ></date-picker>
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
                        class="form-control"
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

        <GroupOfTests :stepId="2"></GroupOfTests>

        <div class="p-2"></div>

        <BloodTest :stepId="2"></BloodTest>

        <div class="p-4"></div>

        <div class="form-group">
            <button
                type="button"
                class="btn btn-secondary btn-control"
                @click="prev()"
            >
                Назад
            </button>
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
import GroupOfTests from "./GroupOfTests";
import DiagnosticTest from "./DiagnosticTest";
import BloodTest from "./BloodTest";

export default {
    components: { GroupOfTests, DiagnosticTest, BloodTest },

    data() {
        return {
            fields: {
                Пол: "",
                "Болен с месяца": "",

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

        next() {
            this.$emit("next", this.fields);
        },

        prev() {
            this.$emit("prev", this.fields);
        },
    },

    beforeMount() {
        this.addTest();
    },
};
</script>

<style scoped>
</style>
