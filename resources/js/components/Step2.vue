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

        <DiagnosticTest
            v-for="(test, index) in fields['Обследования']"
            :index="index"
            :test="test"
            :key="test.id"
            @remove="removeTest(index)"
            @update="updateTest(index, $event)"
        ></DiagnosticTest>

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

        <div class="form-group">
            <h3>Лабораторные исследования</h3>

            <label>Общий анализ крови</label>

            <div class="blood-row">
                <!--  col 1 -->
                <div class="blood-col">
                    <div>
                        <div>ER</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['ER']"
                            />
                        </div>
                        <div>1012/л</div>
                    </div>

                    <div>
                        <div>Hb</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['Hb']"
                            />
                        </div>
                        <div>г/л</div>
                    </div>

                    <div>
                        <div>Le</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['Le']"
                            />
                        </div>
                        <div>109/л</div>
                    </div>

                    <div>
                        <div>Tr</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['Tr']"
                            />
                        </div>
                        <div>109/л</div>
                    </div>

                    <div>
                        <div>СОЭ</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['СОЭ']"
                            />
                        </div>
                        <div>мм/ч</div>
                    </div>

                    <div>
                        <div>п/я</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['п/я']"
                            />
                        </div>
                        <div>%</div>
                    </div>

                    <div>
                        <div>с/я</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['с/я']"
                            />
                        </div>
                        <div>%</div>
                    </div>

                    <div>
                        <div>Ly</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['Ly']"
                            />
                        </div>
                        <div>%</div>
                    </div>

                    <div>
                        <div>Mo</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['Mo']"
                            />
                        </div>
                        <div>%</div>
                    </div>

                    <div>
                        <div>Bas</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['Bas']"
                            />
                        </div>
                        <div>%</div>
                    </div>

                    <div>
                        <div>Эо</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['Эо']"
                            />
                        </div>
                        <div>%</div>
                    </div>
                </div>
                <!-- /col 1 -->

                <div class="blood-col"></div>

                <!--  col-2 -->
                <div class="blood-col">
                    <div>
                        <div>АсАт</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови']['АсАт'].value
                                "
                            />
                        </div>
                        <div>Eд/л</div>
                    </div>

                    <div>
                        <div>АлАт</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови']['АлАт'].value
                                "
                            />
                        </div>
                        <div>Eд/л</div>
                    </div>

                    <div>
                        <div>ЛДГ</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови']['ЛДГ'].value
                                "
                            />
                        </div>
                        <div>Eд/л</div>
                    </div>

                    <div>
                        <div>Скорректированный Ca2+</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови'][
                                        'Скорректированный Ca2+'
                                    ].value
                                "
                            />
                        </div>
                        <div>мМ/л</div>
                    </div>

                    <div>
                        <div>Мочевина крови</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови'][
                                        'Мочевина крови'
                                    ].value
                                "
                            />
                        </div>
                        <div>мМ/л</div>
                    </div>

                    <div>
                        <div>Креатинин крови</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови'][
                                        'Креатинин крови'
                                    ].value
                                "
                            />
                        </div>
                        <div>мМ/л</div>
                    </div>

                    <div>
                        <div>Миелоциты</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови']['Миелоциты']
                                "
                            />
                        </div>
                        <div>%</div>
                    </div>

                    <div>
                        <div>Метамиел</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови']['Метамиел']
                                "
                            />
                        </div>
                        <div>%</div>
                    </div>
                </div>
                <!-- /col-2 -->

                <!--  col 3 -->
                <div class="blood-col">
                    <div>
                        <div>(N =</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['АсАт'].N"
                            />
                        </div>
                        <div>Eд/л)</div>
                    </div>
                    <div>
                        <div>(N =</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['АлАт'].N"
                            />
                        </div>
                        <div>Eд/л)</div>
                    </div>
                    <div>
                        <div>(N =</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Общий анализ крови']['ЛДГ'].N"
                            />
                        </div>
                        <div>Eд/л)</div>
                    </div>
                    <div>
                        <div>(N =</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови'][
                                        'Скорректированный Ca2+'
                                    ].N
                                "
                            />
                        </div>
                        <div>Eд/л)</div>
                    </div>
                    <div>
                        <div>(N =</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови'][
                                        'Мочевина крови'
                                    ].N
                                "
                            />
                        </div>
                        <div>Eд/л)</div>
                    </div>
                    <div>
                        <div>(N =</div>
                        <div>
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Общий анализ крови'][
                                        'Креатинин крови'
                                    ].N
                                "
                            />
                        </div>
                        <div>Eд/л)</div>
                    </div>
                </div>
                <!-- /col 3 -->
            </div>
        </div>

        <div class="p-2"></div>

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

export default {
    components: { DiagnosticTest },
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

                "Общий анализ крови": {
                    ER: "",
                    Hb: "",
                    Le: "",
                    Tr: "",
                    СОЭ: "",
                    "п/я": "",
                    "с/я": "",
                    Ly: "",
                    Mo: "",
                    Bas: "",
                    Эо: "",

                    АсАт: {
                        value: "",
                        N: "",
                    },

                    АлАт: {
                        value: "",
                        N: "",
                    },

                    ЛДГ: {
                        value: "",
                        N: "",
                    },

                    "Скорректированный Ca2+": {
                        value: "",
                        N: "",
                    },

                    "Мочевина крови": {
                        value: "",
                        N: "",
                    },

                    "Креатинин крови": {
                        value: "",
                        N: "",
                    },

                    Миелоциты: "",

                    Метамиел: "",
                },
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
