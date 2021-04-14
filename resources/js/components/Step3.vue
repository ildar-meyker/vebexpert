<template>
    <section>
        <h2 class="text-center">Критерии оценки прогноза ПКР по D. Heng*</h2>

        <table class="hang-table">
            <tr>
                <td>
                    <div class="name">Факторы риска</div>
                </td>
                <td>
                    <div class="name">Значение показателя</div>
                </td>
                <td>
                    <div class="name">Наличие факторов</div>
                </td>
            </tr>
            <tr>
                <td>Индекс Карновского (Шкала ECOG)</td>
                <td>&lt; 80% (> 1)</td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="fields['Индекс Карновского (Шкала ECOG)']"
                    />
                </td>
            </tr>
            <tr>
                <td>Время от постановки диагноза до начала терапии</td>
                <td>менее 12 месяцев</td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="
                            fields[
                                'Время от постановки диагноза до начала терапии'
                            ]
                        "
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень гемоглобина</td>
                <td>&lt; нижней границы нормы</td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="fields['Уровень гемоглобина']"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень лактатдегидрогеназы</td>
                <td>До 1000 Ед/л</td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="fields['Уровень лактатдегидрогеназы']"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень скорректированного кальция</td>
                <td>&gt; 10 мг/дл (или 2,5 ммоль/л)</td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="fields['Уровень скорректированного кальция']"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень нейтрофилов</td>
                <td>&gt; 6,5 х 109/л</td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="fields['Уровень нейтрофилов']"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень тромбоцитов</td>
                <td>&gt; 320 х 109/л</td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="fields['Уровень тромбоцитов']"
                    />
                </td>
            </tr>
            <tr>
                <td>Наличие метастатических очагов</td>
                <td>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Указать кол-во Meta"
                        v-model="
                            fields['Наличие метастатических очагов'][
                                'Кол-во Meta'
                            ]
                        "
                    />
                </td>
                <td>
                    <input
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                        v-model="fields['Наличие метастатических очагов'].value"
                    />
                </td>
            </tr>
        </table>

        <div class="p-3"></div>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">
                    <strong>ЗАКЛЮЧЕНИЕ:</strong> В данном случае имеет место
                </div>
                <div class="col-3">
                    <v-select
                        :options="['хороший', 'промежуточный', 'плохой']"
                        placeholder="Выбрать из списка"
                        v-model="fields['Прогноз по MSKCC']"
                    ></v-select>
                </div>
                <div class="col-auto">прогноз по MSKCC</div>
            </div>
        </div>

        <div class="p-4"></div>

        <AttachFile :max="5" @change="updateFiles"></AttachFile>

        <div class="p-3"></div>

        <div class="form-group">
            <textarea
                rows="5"
                class="form-control"
                placeholder="Комментарий"
                v-model="fields['Комментарий']"
            ></textarea>
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
export default {
    data() {
        return {
            fields: {
                "Индекс Карновского (Шкала ECOG)": "",
                "Время от постановки диагноза до начала терапии": "",
                "Уровень гемоглобина": "",
                "Уровень лактатдегидрогеназы": "",
                "Уровень скорректированного кальция": "",
                "Уровень нейтрофилов": "",
                "Уровень тромбоцитов": "",
                "Наличие метастатических очагов": {
                    "Кол-во Meta": "",
                    value: "",
                },
                "Прогноз по MSKCC": "",
                files: [],
                Комментарий: "",
            },
        };
    },

    methods: {
        updateFiles(files) {
            this.fields.files = _.cloneDeep(files);
        },

        next() {
            this.$emit("next", this.fields);
        },

        prev() {
            this.$emit("prev", this.fields);
        },
    },
};
</script>

<style scoped>
.hang-table {
    width: 100%;
}

.hang-table td {
    padding-left: 30px;
    vertical-align: middle;
    padding-bottom: 10px;
}

.hang-table td:first-child {
    padding-left: 0;
    width: 40%;
}

.hang-table td:last-child {
    width: 1%;
}

.hang-table input.form-control {
    width: 180px;
}

.hang-table .name {
    padding-bottom: 10px;
    font-weight: bold;
}
</style>
