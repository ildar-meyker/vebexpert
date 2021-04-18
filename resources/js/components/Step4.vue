<template>
    <section>
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
                    ></v-select>
                    <input
                        name="step4[Проведена операция]"
                        type="hidden"
                        v-model="fields['Проведена операция']"
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
                        ></v-select>
                        <input
                            name="step4[Нефрэктомия][Вид]"
                            type="hidden"
                            v-model="fields['Нефрэктомия']['Вид']"
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
                        ></v-select>
                        <input
                            name="step4[Нефрэктомия][Способ]"
                            type="hidden"
                            v-model="fields['Нефрэктомия']['Способ']"
                        />
                    </div>
                    <div class="col-2">
                        <date-picker
                            :input-attr="{ name: 'step4[Нефрэктомия][Дата]' }"
                            valueType="format"
                            placeholder="Дата"
                            v-model="fields['Нефрэктомия']['Дата']"
                        ></date-picker>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label
                    >Выполнена биобсия операционного материала. Проведено
                    гистологическое исследование:</label
                >
                <input
                    name="step4[Гистологическое исследование]"
                    type="text"
                    class="form-control"
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
                        class="form-control"
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
            <OtherDisease
                v-for="(disease, index) in fields['Сопутствующие заболевания']"
                :stepId="4"
                :index="index"
                :disease="disease"
                :key="disease.uid"
                @remove="removeDisease(index)"
                @update="updateDisease(index, $event)"
            ></OtherDisease>
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
import OtherDisease from "./OtherDisease";

export default {
    props: ["gender"],

    components: { OtherDisease },

    data() {
        return {
            fields: {
                "Проведена операция": "",
                Нефрэктомия: {
                    Вид: "",
                    Способ: "",
                    Дата: "",
                },
                "Гистологическое исследование": "",
                "Сопутствующие заболевания": [],
            },
        };
    },

    computed: {
        surgery() {
            return this.fields["Проведена операция"];
        },
    },

    watch: {
        surgery(value) {
            if (value == "Нет") {
                this.fields["Гистологическое исследование"] = "";
                this.fields["Нефрэктомия"]["Вид"] = "";
                this.fields["Нефрэктомия"]["Способ"] = "";
                this.fields["Нефрэктомия"]["Дата"] = "";
            }
        },
    },

    methods: {
        next() {
            this.$emit("next", this.fields);
        },

        prev() {
            this.$emit("prev", this.fields);
        },

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
