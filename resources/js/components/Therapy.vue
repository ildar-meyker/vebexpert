<template>
    <div class="therapy">
        <div class="form-group">
            <div class="form-group" v-if="index > 0">
                На основании полученных данных было принято решение о смене
                терапии.
            </div>

            <div class="row align-items-center">
                <div class="col-auto">
                    В качестве терапии {{ index + 1 }}-й линии начат прием
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
                        v-model="fields['Препарат']"
                        :class="[
                            {
                                error: !!errors[
                                    'step' +
                                        stepId +
                                        '[Линии терапии][' +
                                        index +
                                        '][Препарат]'
                                ],
                            },
                        ]"
                    ></v-select>
                    <input
                        :name="
                            'step' +
                            stepId +
                            '[Линии терапии][' +
                            index +
                            '][Препарат]'
                        "
                        type="text"
                        class="out-of-screen"
                        v-model="fields['Препарат']"
                        data-label="Препарат"
                    />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Выбор данной терапевтической опции обусловлен:</label>
            <input
                :name="
                    'step' +
                    stepId +
                    '[Линии терапии][' +
                    index +
                    '][Обоснование выбора]'
                "
                type="text"
                :class="[
                    'form-control',
                    {
                        error: !!errors[
                            'step' +
                                stepId +
                                '[Линии терапии][' +
                                index +
                                '][Обоснование выбора]'
                        ],
                    },
                ]"
                placeholder="Обоснование выбора"
                v-model="fields['Обоснование выбора']"
            />
        </div>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">Изменение состояния пациента</div>
                <div class="col-3">
                    <v-select
                        :options="['улучшилось', 'ухудшилось']"
                        placeholder="Выбрать из списка"
                        v-model="fields['Изменение состояния']"
                        :class="[
                            {
                                error: !!errors[
                                    'step' +
                                        stepId +
                                        '[Линии терапии][' +
                                        index +
                                        '][Изменение состояния]'
                                ],
                            },
                        ]"
                    ></v-select>
                    <input
                        :name="
                            'step' +
                            stepId +
                            '[Линии терапии][' +
                            index +
                            '][Изменение состояния]'
                        "
                        type="text"
                        class="out-of-screen"
                        v-model="fields['Изменение состояния']"
                        data-label="Изменение состояния"
                    />
                </div>
            </div>
        </div>

        <template v-if="fields['Изменение состояния'] == 'ухудшилось'">
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
                            v-model="fields['Ухудшение связано с']"
                            :class="[
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            '[Линии терапии][' +
                                            index +
                                            '][Ухудшение связано с]'
                                    ],
                                },
                            ]"
                        ></v-select>
                        <input
                            :name="
                                'step' +
                                stepId +
                                '[Линии терапии][' +
                                index +
                                '][Ухудшение связано с]'
                            "
                            type="text"
                            class="out-of-screen"
                            v-model="fields['Ухудшение связано с']"
                            data-label="Ухудшение связано с"
                        />
                    </div>
                    <div
                        v-if="
                            fields['Ухудшение связано с'] ===
                            'развитием побочных эффектов'
                        "
                        class="col-auto"
                    >
                        таких как
                    </div>
                </div>
            </div>

            <div
                v-if="
                    fields['Ухудшение связано с'] ===
                    'развитием побочных эффектов'
                "
                class="form-group"
            >
                <input
                    :name="
                        'step' +
                        stepId +
                        '[Линии терапии][' +
                        index +
                        '][Побочные эффекты]'
                    "
                    type="text"
                    :class="[
                        'form-control',
                        {
                            error: !!errors[
                                'step' +
                                    stepId +
                                    '[Линии терапии][' +
                                    index +
                                    '][Побочные эффекты]'
                            ],
                        },
                    ]"
                    placeholder="Описание побочных эффектов"
                    v-model="fields['Побочные эффекты']"
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
                            v-model="fields['Принято решение о']"
                            :class="[
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            '[Линии терапии][' +
                                            index +
                                            '][Принято решение о]'
                                    ],
                                },
                            ]"
                        ></v-select>
                        <input
                            :name="
                                'step' +
                                stepId +
                                '[Линии терапии][' +
                                index +
                                '][Принято решение о]'
                            "
                            type="text"
                            class="out-of-screen"
                            v-model="fields['Принято решение о']"
                            data-label="Принято решение о"
                        />
                    </div>
                    <template
                        v-if="
                            fields['Принято решение о'] ==
                            'снижении дозы препарата'
                        "
                    >
                        <div class="col-auto">c</div>
                        <div class="col-1">
                            <input
                                :name="
                                    'step' +
                                    stepId +
                                    '[Линии терапии][' +
                                    index +
                                    '][Cнижение дозы препарата][c]'
                                "
                                type="text"
                                :class="[
                                    'form-control',
                                    {
                                        error: !!errors[
                                            'step' +
                                                stepId +
                                                '[Линии терапии][' +
                                                index +
                                                '][Cнижение дозы препарата][c]'
                                        ],
                                    },
                                ]"
                                v-model="fields['Cнижение дозы препарата']['c']"
                                data-label="c"
                            />
                        </div>
                        <div class="col-auto">мг. до</div>
                        <div class="col-1">
                            <input
                                :name="
                                    'step' +
                                    stepId +
                                    '[Линии терапии][' +
                                    index +
                                    '][Cнижение дозы препарата][до]'
                                "
                                type="text"
                                :class="[
                                    'form-control',
                                    {
                                        error: !!errors[
                                            'step' +
                                                stepId +
                                                '[Линии терапии][' +
                                                index +
                                                '][Cнижение дозы препарата][до]'
                                        ],
                                    },
                                ]"
                                v-model="
                                    fields['Cнижение дозы препарата']['до']
                                "
                                data-label="до"
                            />
                        </div>
                        <div class="col-auto">мг.</div>
                    </template>
                </div>
            </div>

            <div
                v-if="
                    fields['Принято решение о'] == 'временной отмене препарата'
                "
                class="form-group"
            >
                <div class="row align-items-center">
                    <div class="col-auto">Лечение было</div>
                    <div class="col-3">
                        <v-select
                            :options="['возобновлено', 'отменено']"
                            placeholder="Выбрать из списка"
                            v-model="fields['Лечение было']"
                            :class="[
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            '[Линии терапии][' +
                                            index +
                                            '][Лечение было]'
                                    ],
                                },
                            ]"
                        ></v-select>
                        <input
                            :name="
                                'step' +
                                stepId +
                                '[Линии терапии][' +
                                index +
                                '][Лечение было]'
                            "
                            type="text"
                            class="out-of-screen"
                            v-model="fields['Лечение было']"
                        />
                    </div>

                    <template v-if="fields['Лечение было'] == 'возобновлено'">
                        <div class="col-auto">через</div>
                        <div class="col-1">
                            <input
                                :name="
                                    'step' +
                                    stepId +
                                    '[Линии терапии][' +
                                    index +
                                    '][Лечение возобновлено][через]'
                                "
                                type="text"
                                :class="[
                                    'form-control',
                                    {
                                        error: !!errors[
                                            'step' +
                                                stepId +
                                                '[Линии терапии][' +
                                                index +
                                                '][Лечение возобновлено][через]'
                                        ],
                                    },
                                ]"
                                v-model="
                                    fields['Лечение возобновлено']['через']
                                "
                            />
                        </div>
                        <div class="col-auto">недель в дозе</div>
                        <div class="col-1">
                            <input
                                :name="
                                    'step' +
                                    stepId +
                                    '[Линии терапии][' +
                                    index +
                                    '][Лечение возобновлено][в дозе]'
                                "
                                type="text"
                                :class="[
                                    'form-control',
                                    {
                                        error: !!errors[
                                            'step' +
                                                stepId +
                                                '[Линии терапии][' +
                                                index +
                                                '][Лечение возобновлено][в дозе]'
                                        ],
                                    },
                                ]"
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

        <div class="form-group">
            <textarea
                :name="
                    'step' +
                    stepId +
                    '[Линии терапии][' +
                    index +
                    '][Комментарий]'
                "
                :class="[
                    'form-control',
                    {
                        error: !!errors[
                            'step' +
                                stepId +
                                '[Линии терапии][' +
                                index +
                                '][Комментарий]'
                        ],
                    },
                ]"
                rows="5"
                placeholder="Комментарий"
                v-model="fields['Комментарий']"
            ></textarea>
        </div>

        <div class="form-group">
            <label>При проведении контрольного обследования выявлено:</label>
            <DiagnosticTest
                v-for="(test, testIndex) in fields['Обследования']"
                :errors="errors"
                :stepId="5"
                :prefix="'[Линии терапии][' + index + ']'"
                :index="testIndex"
                :test="test"
                :key="test.uid"
                @remove="removeTest(testIndex)"
                @update="updateTest(testIndex, $event)"
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

        <AttachFile
            :errors="errors"
            :stepId="5"
            :prefix="'[Линии терапии][' + index + ']'"
            :name="'images'"
            :max="5"
            :accept="'image/*'"
        ></AttachFile>

        <div class="p-3"></div>

        <GroupOfTests
            :errors="errors"
            :stepId="5"
            :prefix="'[Линии терапии][' + index + ']'"
        ></GroupOfTests>

        <div class="p-2"></div>

        <BloodTest
            :errors="errors"
            :stepId="5"
            :prefix="'[Линии терапии][' + index + ']'"
        ></BloodTest>

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
                        v-model="fields['Констатировано наличие']"
                        :class="[
                            {
                                error: !!errors[
                                    'step' +
                                        stepId +
                                        '[Линии терапии][' +
                                        index +
                                        '][Констатировано наличие]'
                                ],
                            },
                        ]"
                    ></v-select>
                    <input
                        :name="
                            'step' +
                            stepId +
                            '[Линии терапии][' +
                            index +
                            '][Констатировано наличие]'
                        "
                        type="text"
                        class="out-of-screen"
                        v-model="fields['Констатировано наличие']"
                        data-label="Констатировано наличие"
                    />
                </div>
            </div>
        </div>
        <div class="therapy__controls" v-if="index != 0">
            <button type="button" class="btn-remove" @click="remove()">
                ×
            </button>
        </div>
    </div>
</template>

<script>
import GroupOfTests from "./GroupOfTests";
import DiagnosticTest from "./DiagnosticTest";
import BloodTest from "./BloodTest";

export default {
    components: { GroupOfTests, DiagnosticTest, BloodTest },

    props: {
        errors: {
            type: Object,
        },
        stepId: {
            type: Number,
        },
        index: {
            type: Number,
        },
        therapy: {
            type: Object,
        },
    },
    data() {
        return {
            fields: _.cloneDeep(this.therapy),
        };
    },

    watch: {
        therapy: {
            deep: true,
            handler() {
                this.fields = _.cloneDeep(this.therapy);
            },
        },

        fields: {
            deep: true,
            handler() {
                this.$emit("update", this.fields);
            },
        },
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

        remove() {
            this.$emit("remove");
        },
    },

    beforeMount() {
        this.addTest();
    },
};
</script>

<style scoped>
.therapy:not(:first-child) {
    position: relative;
    border-top: 1px solid #d6d6d6;
    padding-top: 30px;
    margin-top: 40px;
}

.therapy__controls {
    position: absolute;
    top: 10px;
    right: 0;
}
</style>
