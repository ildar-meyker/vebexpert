<template>
    <section>
        <h2>Терапия</h2>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">
                    Химиотерапевтическое лечение было начато через
                </div>
                <div class="col-1">
                    <input
                        type="text"
                        class="form-control"
                        v-model="
                            fields[
                                'Химиотерапевтическое лечение было начато через'
                            ]
                        "
                    />
                </div>
                <div class="col-auto">мес. с момента постановки диагноза.</div>
            </div>
        </div>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">
                    В качестве терапии 1-й линии начат прием
                </div>
                <div class="col-3">
                    <v-select
                        :options="[
                            'акситиниба',
                            'акстиниб+пембролизумаб',
                            'бевацизумаба+IFN-α',
                            'ипилимумаба',
                            'кабозантиниба',
                            'кабозантиниб+ниволумаб',
                            'ленватиниба',
                            'ниволумаба',
                            'ниволумаб+ипилимумаб',
                            'пазопаниба',
                            'пембролизумаба',
                            'сунитиниба',
                            'сорафениба',
                            'темсиролимуса',
                            'эверолимуса',
                            'IFN-α',
                            'другое',
                        ]"
                        placeholder="Выбрать из списка"
                        v-model="
                            fields['В качестве терапии 1-й линии начат прием']
                        "
                    ></v-select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Выбор данной терапевтической опции обусловлен:</label>
            <input
                type="text"
                class="form-control"
                placeholder="Обоснование выбора"
                v-model="fields['Обоснование выбора']"
            />
        </div>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">
                    На фоне проводимой терапии состояние пациента
                </div>
                <div class="col-3">
                    <v-select
                        :options="['улучшилось', 'ухудшилось']"
                        placeholder="Выбрать из списка"
                        v-model="
                            fields[
                                'На фоне проводимой терапии состояние пациента'
                            ]
                        "
                    ></v-select>
                </div>
            </div>
        </div>

        <template
            v-if="
                fields['На фоне проводимой терапии состояние пациента'] ==
                'ухудшилось'
            "
        >
            <div class="form-group">
                <div class="row align-items-center">
                    <div class="col-auto">Ухудшение состояния связано с</div>
                    <div class="col-4">
                        <v-select
                            :options="[
                                'развитием побочных эффектов',
                                'прогрессированием заболевания',
                            ]"
                            placeholder="Выбрать из списка"
                            v-model="fields['Ухудшение состояния связано с']"
                        ></v-select>
                    </div>
                    <div class="col-auto">таких как</div>
                </div>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Описание побочных эффектов"
                    v-model="fields['Описание побочных эффектов']"
                />
            </div>

            <div class="form-group">
                <div class="row align-items-center">
                    <div class="col-auto">Было принято решение о</div>
                    <div class="col-4">
                        <v-select
                            :options="[
                                'снижении дозы препарата',
                                'временной отмене препарата',
                            ]"
                            placeholder="Выбрать из списка"
                            v-model="fields['Было принято решение о']"
                        ></v-select>
                    </div>
                    <template
                        v-if="
                            fields['Было принято решение о'] ==
                            'снижении дозы препарата'
                        "
                    >
                        <div class="col-auto">c</div>
                        <div class="col-1">
                            <input
                                type="text"
                                class="form-control"
                                v-model="fields['Cнижение дозы препарата']['c']"
                            />
                        </div>
                        <div class="col-auto">мг. до</div>
                        <div class="col-1">
                            <input
                                type="text"
                                class="form-control"
                                v-model="
                                    fields['Cнижение дозы препарата']['до']
                                "
                            />
                        </div>
                        <div class="col-auto">мг.</div>
                    </template>
                </div>
            </div>

            <template
                v-if="
                    fields['Было принято решение о'] ==
                    'временной отмене препарата'
                "
            >
                <div class="form-group">
                    <div class="row align-items-center">
                        <div class="col-auto">Лечение было</div>
                        <div class="col-3">
                            <v-select
                                :options="['возобновлено', 'отменено']"
                                placeholder="Выбрать из списка"
                                v-model="fields['Лечение было']"
                            ></v-select>
                        </div>

                        <template
                            v-if="fields['Лечение было'] == 'возобновлено'"
                        >
                            <div class="col-auto">через</div>
                            <div class="col-1">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="
                                        fields['Лечение возобновлено'][
                                            'через недель'
                                        ]
                                    "
                                />
                            </div>
                            <div class="col-auto">недель в дозе</div>
                            <div class="col-1">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="
                                        fields['Лечение возобновлено']['в дозе']
                                    "
                                />
                            </div>
                            <div class="col-auto">мг.</div>
                        </template>
                    </div>
                </div>
            </template>
        </template>

        <div class="form-group">
            <textarea
                class="form-control"
                rows="5"
                placeholder="Комментарий"
                v-model="fields['Комментарий 1']"
            ></textarea>
        </div>

        <div class="form-group">
            <label>При проведении контрольного обследования выявлено:</label>
            <DiagnosticTest
                v-for="(test, index) in fields['Обследования']"
                stepId="5"
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

        <div class="p-3"></div>

        <AttachFile stepId="5" count="5"></AttachFile>

        <div class="p-3"></div>

        <GroupOfTests stepId="5"></GroupOfTests>

        <div class="p-2"></div>

        <BloodTest stepId="5"></BloodTest>

        <div class="p-3"></div>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">Константировано наличие</div>
                <div class="col-4">
                    <v-select
                        :options="[
                            'стабилизации заболевания',
                            'частичного ответа',
                            'полного ответа',
                            'прогрессирования заболевания',
                            'рецидива заболевания',
                            'ремиссии заболевания',
                        ]"
                        placeholder="Выбрать из списка"
                        v-model="fields['Константировано наличие']"
                    ></v-select>
                </div>
            </div>
        </div>

        <div class="p-2"></div>

        <div class="form-group">
            <div class="text-center">
                <button class="btn btn-primary" @click="addTherapy()">
                    Добавить линию терапии
                </button>
            </div>
        </div>

        <div class="p-2"></div>

        <div class="form-group">
            <textarea
                class="form-control"
                rows="5"
                placeholder="Комментарий"
                v-model="fields['Комментарий 2']"
            ></textarea>
        </div>

        <div class="p-2"></div>

        <div class="form-group">
            <label
                ><b
                    >Данный клинический случай может быть представлен на
                    образовательных мероприятиях:</b
                ></label
            >

            <div class="form-check" v-for="(option, index) in sharingOptions">
                <input
                    class="form-check-input"
                    type="checkbox"
                    :id="`sharing${index}`"
                    :value="option"
                    v-model="
                        fields[
                            'Данный клинический случай может быть представлен на образовательных мероприятиях'
                        ]
                    "
                />
                <label class="form-check-label" :for="`sharing${index}`">
                    {{ option }}
                </label>
            </div>
        </div>

        <div class="p-2"></div>

        <AttachFile
            stepId="5"
            count="1"
            label="Прикрепить звуковой файл"
            @change="updateSounds"
        ></AttachFile>

        <div class="p-4"></div>

        <div class="form-group">
            <button
                type="button"
                class="btn btn-secondary btn-control"
                @click="prev()"
            >
                Назад
            </button>
            <button type="submit" class="btn btn-primary btn-control">
                Сохранить в pdf
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
            sharingOptions: [
                "третьими лицам",
                "только лично автором",
                "доступен для ознакомления другим специалистам",
            ],

            fields: {
                "Химиотерапевтическое лечение было начато через": "",

                "В качестве терапии 1-й линии начат прием": "",

                "Обоснование выбора": "",

                "На фоне проводимой терапии состояние пациента": "",

                "Ухудшение состояния связано с": "",

                "Описание побочных эффектов": "",

                "Было принято решение о": "",

                "Cнижение дозы препарата": {
                    c: "",
                    до: "",
                },

                "Лечение было": "",

                "Лечение возобновлено": {
                    "через недель": "",
                    "в дозе": "",
                },

                "Комментарий 1": "",

                Обследования: [],

                files: [],

                "Константировано наличие": "",

                sounds: [],

                "Линии терапии": [],

                "Комментарий 2": "",

                "Данный клинический случай может быть представлен на образовательных мероприятиях": [],
            },
        };
    },

    computed: {
        pillsDicision() {
            return this.fields["Было принято решение о"];
        },

        treatmentDiсision() {
            return this.fields["Лечение было"];
        },

        patientCondition() {
            return this.fields["На фоне проводимой терапии состояние пациента"];
        },
    },

    watch: {
        patientCondition(value) {
            if (value != "ухудшилось") {
                this.fields["Ухудшение состояния связано с"] = "";
                this.fields["Описание побочных эффектов"] = "";
                this.fields["Было принято решение о"] = "";
            }
        },

        pillsDicision(value) {
            if (value != "снижении дозы препарата") {
                this.fields["Cнижение дозы препарата"]["c"] = "";
                this.fields["Cнижение дозы препарата"]["до"] = "";
            }

            if (value != "временной отмене препарата") {
                this.fields["Лечение было"] = "";
            }
        },

        treatmentDiсision(value) {
            if (value != "возобновлено") {
                this.fields["Лечение возобновлено"]["через недель"] = "";
                this.fields["Лечение возобновлено"]["в дозе"] = "";
            }
        },
    },

    methods: {
        addTherapy() {},

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

        updateSounds(files) {
            this.fields.sounds = _.cloneDeep(files);
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
