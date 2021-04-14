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
                        v-model="
                            fields['Операция по удалению первичной опухоли']
                        "
                    ></v-select>
                </div>
            </div>
        </div>

        <template
            v-if="fields['Операция по удалению первичной опухоли'] == 'Да'"
        >
            <div class="form-group">
                <div class="row align-items-center">
                    <div class="col-auto">Выполнена</div>
                    <div class="col-3">
                        <v-select
                            :options="['паллиативная', 'радикальная']"
                            placeholder="Выбрать из списка"
                            v-model="fields['Нефрэктомия']['Вид']"
                        ></v-select>
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
                    </div>
                    <div class="col-2">
                        <date-picker
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
                        rows="3"
                        class="form-control"
                        placeholder="Описание и заключение"
                    ></textarea>
                </div>
                <div class="col-4">
                    <div class="example">
                        <strong>Пример:</strong> Распространенный
                        светлоклеточный рак правой почки G3. Состояние после
                        нефрэктомии справа (ноябрь 2019.). T3b N0 M1 G3/
                        Промежуточный прогноз по MSKCC
                    </div>
                </div>
            </div>
        </div>

        <OtherDisease
            v-for="(disease, index) in fields['Сопутствующие заболевания']"
            :index="index"
            :disease="disease"
            :key="disease.id"
            @remove="removeDisease(index)"
            @update="updateDisease(index, $event)"
        ></OtherDisease>

        <div class="form-group">
            <button
                type="button"
                class="btn btn-primary btn-control"
                @click="addDisease()"
            >
                Добавить
            </button>
        </div>

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
import OtherDisease from "./OtherDisease";

export default {
    props: ["gender"],

    components: { OtherDisease },

    data() {
        return {
            fields: {
                "Операция по удалению первичной опухоли": "",
                Нефрэктомия: {
                    Вид: "",
                    Способ: "",
                    Дата: "",
                },
                "Гистологическое исследование": "",
                Диагноз: "",
                "Сопутствующие заболевания": [],
            },
        };
    },

    computed: {
        surgery() {
            return this.fields["Операция по удалению первичной опухоли"];
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
                id: _.uniqueId(),
                "Наименование заболевания": "",
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
