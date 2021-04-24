<template>
    <section>
        <Errors :errors="errors"></Errors>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span v-if="gender == 'Женщина'">Пациентке</span>
                    <span v-else>Пациенту</span>
                    была проведена операция по удалению первичной опухоли
                </div>
                <div class="col-2">
                    <v-select
                        :options="['Да', 'Нет']"
                        placeholder="Да/Нет"
                        v-model="fields['Проведена операция']"
                        :class="[
                            {
                                error: !!errors['step4[Проведена операция]'],
                            },
                        ]"
                    ></v-select>
                    <input
                        name="step4[Проведена операция]"
                        type="text"
                        class="out-of-screen"
                        v-model="fields['Проведена операция']"
                        data-label="Проведена операция"
                    />
                </div>
            </div>
        </div>

        <template v-if="fields['Проведена операция'] == 'Да'">
            <div class="form-group">
                <div class="row align-items-center">
                    <div class="col-auto">Выполнена</div>
                    <div class="col-3">
                        <v-select
                            :options="['паллиативная', 'радикальная']"
                            placeholder="Выбрать из списка"
                            v-model="fields['Нефрэктомия']['Вид']"
                            :class="[
                                {
                                    error: !!errors['step4[Нефрэктомия][Вид]'],
                                },
                            ]"
                        ></v-select>
                        <input
                            name="step4[Нефрэктомия][Вид]"
                            type="text"
                            class="out-of-screen"
                            v-model="fields['Нефрэктомия']['Вид']"
                            data-label="Вид нефрэктомии"
                        />
                    </div>
                    <div class="col-auto">нефрэктомия</div>
                    <div class="col-3">
                        <v-select
                            :options="[
                                'метастазэктомией',
                                'без метастазэктомии',
                            ]"
                            placeholder="Выбрать из списка"
                            v-model="fields['Нефрэктомия']['Способ']"
                            :class="[
                                {
                                    error: !!errors[
                                        'step4[Нефрэктомия][Способ]'
                                    ],
                                },
                            ]"
                        ></v-select>
                        <input
                            name="step4[Нефрэктомия][Способ]"
                            type="text"
                            class="out-of-screen"
                            v-model="fields['Нефрэктомия']['Способ']"
                            data-label="Cпособ нефрэктомии"
                        />
                    </div>
                    <div class="col-2">
                        <date-picker
                            valueType="format"
                            placeholder="Дата"
                            v-model="fields['Нефрэктомия']['Дата']"
                            :input-class="[
                                'mx-input',
                                {
                                    error: !!errors['step4[Нефрэктомия][Дата]'],
                                },
                            ]"
                        ></date-picker>
                        <input
                            name="step4[Нефрэктомия][Дата]"
                            type="text"
                            class="out-of-screen"
                            v-model="fields['Нефрэктомия']['Дата']"
                            data-label="Дата"
                        />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label
                    >Выполнена биопсия операционного материала. Проведено
                    гистологическое исследование:</label
                >
                <input
                    name="step4[Гистологическое исследование]"
                    type="text"
                    :class="[
                        'form-control',
                        {
                            error: !!errors[
                                'step4[Гистологическое исследование]'
                            ],
                        },
                    ]"
                    placeholder="Указать гистологическое исследование"
                    v-model="fields['Гистологическое исследование']"
                />
            </div>
        </template>

        <div class="form-group">
            <label
                >Таким образом, на основании данных обследования установлен
                диагноз:</label
            >
            <div class="row">
                <div class="col-8">
                    <textarea
                        name="step4[Диагноз]"
                        rows="3"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step4[Диагноз]'],
                            },
                        ]"
                        placeholder="Описание и заключение"
                    ></textarea>
                </div>
                <div class="col-4">
                    <div class="example">
                        <b>Пример:</b> Распространенный светлоклеточный рак
                        правой почки G3. Состояние после нефрэктомии справа
                        (ноябрь 2019.). T3b N0 M1 G3/ Промежуточный прогноз по
                        MSKCC
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Сопутствующие заболевания:</label>
            <Disease
                v-for="(disease, index) in fields['Сопутствующие заболевания']"
                :errors="errors"
                :stepId="4"
                :index="index"
                :disease="disease"
                :key="disease.uid"
                @remove="removeDisease(index)"
                @update="updateDisease(index, $event)"
            ></Disease>
        </div>

        <div class="form-group">
            <button
                type="button"
                class="btn btn-primary btn-control"
                @click="addDisease()"
            >
                Добавить
            </button>
        </div>

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
import Disease from "./Disease";
import mixins from "./mixins";

export default {
    mixins: [mixins],

    props: {
        env: {
            type: String,
        },
        gender: {
            type: String,
        },
    },

    components: { Disease },

    data() {
        return {
            errors: {},
            stepId: 4,
            fields: {
                "Проведена операция": "",
                Нефрэктомия: {
                    Вид: "",
                    Способ: "",
                    Дата: "",
                },
                "Сопутствующие заболевания": [],
            },
        };
    },

    methods: {
        addDisease() {
            this.fields["Сопутствующие заболевания"].push({
                uid: _.uniqueId(),
                Диагноз: "",
            });
        },

        removeDisease(index) {
            this.fields["Сопутствующие заболевания"].splice(index, 1);
        },

        updateDisease(index, fields) {
            this.fields["Сопутствующие заболевания"][index] = fields;
        },

        fill() {
            if (process.env.NODE_ENV === "development") {
                $('[name="step4[Проведена операция]').val("Да");

                this.triggerInputEvent();

                setTimeout(() => {
                    $('[name="step4[Нефрэктомия][Вид]').val("радикальная");
                    $('[name="step4[Нефрэктомия][Способ]').val(
                        "метастазэктомией"
                    );
                    $('[name="step4[Нефрэктомия][Дата]').val("2010-06-11");
                    $('[name="step4[Гистологическое исследование]').val(
                        "Микроскопическое исследование тканей"
                    );
                    $('[name="step4[Диагноз]').val(
                        "Распространенный светлоклеточный рак правой почки G3."
                    );
                    $(
                        '[name="step4[Сопутствующие заболевания][0][Диагноз]'
                    ).val("Туберкулез");

                    this.triggerInputEvent();
                }, 10);
            }
        },
    },

    beforeMount() {
        this.addDisease();
    },
};
</script>

<style scoped>
.example {
    font-size: 15px;
}

.addon__controls {
    right: 0;
}
</style>
