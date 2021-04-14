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
                </div>
                <div class="col">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Инициалы"
                        v-model="fields['Инициалы']"
                    />
                </div>
                <div class="col">
                    <date-picker
                        valueType="format"
                        type="year"
                        placeholder="Год рождения"
                        v-model="fields['Год рождения']"
                    ></date-picker>
                </div>
                <div class="col col-label">
                    <span v-if="fields.gender == 'Женщина'">
                        считает себя больной с
                    </span>
                    <span v-else> считает себя больным с </span>
                </div>
                <div class="col">
                    <date-picker
                        valueType="format"
                        type="month"
                        placeholder="Месяц"
                        v-model="fields['Болен с месяца']"
                    ></date-picker>
                </div>
                <div class="col">
                    <date-picker
                        valueType="format"
                        type="year"
                        placeholder="Год"
                        v-model="fields['Болен с года']"
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
                        type="text"
                        class="form-control"
                        placeholder="Описание жалоб"
                        v-model="fields['Описание жалоб']"
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
                :index="index"
                :test="test"
                :key="test.id"
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

        <div class="row">
            <div class="col-6" style="padding-right: 30px">
                <div class="form-group">
                    <div class="row">
                        <div class="col col-label">
                            Рентгенография органов грудной клетки
                        </div>
                        <div class="col col-date">
                            <date-picker
                                valueType="format"
                                placeholder="Дата"
                                v-model="fields['Рентген груди']['Дата']"
                            ></date-picker>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea
                        rows="5"
                        class="form-control"
                        placeholder="Описание и заключение"
                        v-model="
                            fields['Рентген груди']['Описание и заключение']
                        "
                    ></textarea>
                </div>
            </div>
            <div class="col-6" style="padding-left: 30px">
                <div class="form-group">
                    <div class="row">
                        <div class="col col-label">Сцинтиграфия костей</div>
                        <div class="col col-date">
                            <date-picker
                                valueType="format"
                                placeholder="Дата"
                                v-model="fields['Сцинтиграфия костей']['Дата']"
                            ></date-picker>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea
                        rows="5"
                        class="form-control"
                        placeholder="Описание и заключение"
                        v-model="
                            fields['Сцинтиграфия костей'][
                                'Описание и заключение'
                            ]
                        "
                    ></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-auto col-label">
                    Проведена диагностическая биопсия
                </div>
                <div class="col">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Наименование органа/ткани"
                        v-model="fields['Биопсия']['Наименование органа/ткани']"
                    />
                </div>
                <div class="col col-date">
                    <date-picker
                        valueType="format"
                        placeholder="Дата"
                        v-model="fields['Биопсия']['Дата']"
                    ></date-picker>
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea
                rows="3"
                class="form-control"
                placeholder="Описание и заключение"
                v-model="fields['Биопсия']['Описание и заключение']"
            ></textarea>
        </div>

        <div class="p-2"></div>

        <BloodTest @update="updateBloodTest"></BloodTest>

        <div class="p-3"></div>

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
import DiagnosticTest from "./DiagnosticTest";
import BloodTest from "./BloodTest";

export default {
    components: { DiagnosticTest, BloodTest },

    data() {
        return {
            fields: {
                Пол: "",
                Инициалы: "",
                "Год рождения": "",
                "Болен с месяца": "",
                "Болен с года": "",
                "Описание жалоб": "",

                Обследования: [],

                "Рентген груди": {
                    Дата: "",
                    "Описание и заключение": "",
                },

                "Сцинтиграфия костей": {
                    Дата: "",
                    "Описание и заключение": "",
                },

                Биопсия: {
                    "Наименование органа/ткани": "",
                    Дата: "",
                    "Описание и заключение": "",
                },

                "Общий анализ крови": {},
            },
        };
    },

    methods: {
        addTest() {
            this.fields["Обследования"].push({
                id: _.uniqueId(),
                "Дата обследования": "",
                "Тип обследования": "",
                "Объект обследования": "",
                "Описание и заключение": "",
            });
        },

        removeTest(index) {
            this.fields["Обследования"].splice(index, 1);
        },

        updateTest(index, fields) {
            this.fields["Обследования"][index] = fields;
        },

        updateBloodTest(fields) {
            this.fields["Общий анализ крови"] = _.cloneDeep(fields);
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
