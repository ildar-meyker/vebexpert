<template>
    <section>
        <h2 class="text-center">Критерии оценки прогноза ПКР по D. Heng*</h2>

        <table class="heng-table">
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
                        name="step3[Индекс Карновского (Шкала ECOG)]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
            <tr>
                <td>Время от постановки диагноза до начала терапии</td>
                <td>менее 12 месяцев</td>
                <td>
                    <input
                        name="step3[Время от постановки диагноза до начала терапии]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень гемоглобина</td>
                <td>&lt; нижней границы нормы</td>
                <td>
                    <input
                        name="step3[Уровень гемоглобина]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень лактатдегидрогеназы</td>
                <td>До 1000 Ед/л</td>
                <td>
                    <input
                        name="step3[Уровень лактатдегидрогеназы]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень скорректированного кальция</td>
                <td>&gt; 10 мг/дл (или 2,5 ммоль/л)</td>
                <td>
                    <input
                        name="step3[Уровень скорректированного кальция]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень нейтрофилов</td>
                <td>&gt; 6,5 х 109/л</td>
                <td>
                    <input
                        name="step3[Уровень нейтрофилов]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
            <tr>
                <td>Уровень тромбоцитов</td>
                <td>&gt; 320 х 109/л</td>
                <td>
                    <input
                        name="step3[Уровень тромбоцитов]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
            <tr>
                <td>Наличие метастатических очагов</td>
                <td>
                    <input
                        name="step3[Количество Meta]"
                        type="text"
                        class="form-control"
                        placeholder="Указать кол-во Meta"
                    />
                </td>
                <td>
                    <input
                        name="step3[Наличие метастатических очагов]"
                        type="text"
                        class="form-control text-center"
                        placeholder="+/-"
                    />
                </td>
            </tr>
        </table>

        <div class="p-3"></div>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">
                    <b>ЗАКЛЮЧЕНИЕ:</b> В данном случае имеет место
                </div>
                <div class="col-3">
                    <v-select
                        :options="['хороший', 'промежуточный', 'плохой']"
                        placeholder="Выбрать из списка"
                        v-model="fields['Прогноз по MSKCC']"
                    ></v-select>
                    <input
                        name="step3[Прогноз по MSKCC]"
                        type="hidden"
                        v-model="fields['Прогноз по MSKCC']"
                    />
                </div>
                <div class="col-auto">прогноз по MSKCC</div>
            </div>
        </div>

        <div class="p-3"></div>

        <AttachFile stepId="3" count="5"></AttachFile>

        <div class="p-3"></div>

        <div class="form-group">
            <textarea
                name="step3[Комментарий]"
                rows="5"
                class="form-control"
                placeholder="Комментарий"
            ></textarea>
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
export default {
    data() {
        return {
            fields: {
                "Прогноз по MSKCC": "",
            },
        };
    },

    methods: {
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
.heng-table {
    width: 100%;
}

.heng-table td {
    padding-left: 30px;
    vertical-align: middle;
    padding-bottom: 10px;
}

.heng-table td:first-child {
    padding-left: 0;
    width: 40%;
}

.heng-table td:last-child {
    width: 1%;
}

.heng-table input.form-control {
    width: 180px;
}

.heng-table .name {
    padding-bottom: 10px;
    font-weight: bold;
}
</style>
