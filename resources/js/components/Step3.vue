<template>
    <section>
        <h2 class="text-center">Критерии оценки прогноза ПКР по D. Heng*</h2>

        <Errors :errors="errors"></Errors>

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
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors[
                                    'step3[Индекс Карновского (Шкала ECOG)]'
                                ],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Индекс Карновского (Шкала ECOG)"
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
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors[
                                    'step3[Время от постановки диагноза до начала терапии]'
                                ],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Время от постановки диагноза до начала терапии"
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
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors['step3[Уровень гемоглобина]'],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Уровень гемоглобина"
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
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors[
                                    'step3[Уровень лактатдегидрогеназы]'
                                ],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Уровень лактатдегидрогеназы"
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
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors[
                                    'step3[Уровень скорректированного кальция]'
                                ],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Уровень скорректированного кальция"
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
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors['step3[Уровень нейтрофилов]'],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Уровень нейтрофилов"
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
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors['step3[Уровень тромбоцитов]'],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Уровень тромбоцитов"
                    />
                </td>
            </tr>
            <tr>
                <td>Наличие метастатических очагов</td>
                <td>
                    <input
                        name="step3[Количество Meta]"
                        type="text"
                        :class="[
                            'form-control',
                            {
                                error: !!errors['step3[Количество Meta]'],
                            },
                        ]"
                        placeholder="Указать кол-во Meta"
                    />
                </td>
                <td>
                    <input
                        name="step3[Наличие метастатических очагов]"
                        type="text"
                        :class="[
                            'form-control',
                            'text-center',
                            {
                                error: !!errors[
                                    'step3[Наличие метастатических очагов]'
                                ],
                            },
                        ]"
                        placeholder="+/-"
                        data-label="Наличие метастатических очагов"
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
                        :class="[
                            {
                                error: !!errors['step3[Прогноз по MSKCC]'],
                            },
                        ]"
                    ></v-select>
                    <input
                        name="step3[Прогноз по MSKCC]"
                        type="text"
                        class="out-of-screen"
                        v-model="fields['Прогноз по MSKCC']"
                        data-label="Прогноз по MSKCC"
                    />
                </div>
                <div class="col-auto">прогноз по MSKCC</div>
            </div>
        </div>

        <div class="p-3"></div>

        <AttachFile
            :errors="errors"
            :stepId="3"
            :name="'images'"
            :max="5"
            :accept="'image/*'"
        ></AttachFile>

        <div class="p-3"></div>

        <div class="form-group">
            <textarea
                name="step3[Комментарий]"
                rows="5"
                :class="[
                    'form-control',
                    {
                        error: !!errors['step3[Комментарий]'],
                    },
                ]"
                placeholder="Комментарий"
            ></textarea>
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
import mixins from "./mixins";

export default {
    mixins: [mixins],

    props: {
        env: {
            type: String,
        },
    },

    data() {
        return {
            errors: {},
            stepId: 3,
            fields: {
                "Прогноз по MSKCC": "",
            },
        };
    },

    methods: {
        fill() {
            $('[name="step3[Индекс Карновского (Шкала ECOG)]"]').val("+");
            $(
                '[name="step3[Время от постановки диагноза до начала терапии]'
            ).val("-");
            $('[name="step3[Уровень гемоглобина]').val("-");
            $('[name="step3[Уровень лактатдегидрогеназы]').val("+");
            $('[name="step3[Уровень скорректированного кальция]').val("-");
            $('[name="step3[Уровень нейтрофилов]').val("+");
            $('[name="step3[Уровень тромбоцитов]').val("+");
            $('[name="step3[Наличие метастатических очагов]').val("+");
            $('[name="step3[Количество Meta]').val(100);
            $('[name="step3[Прогноз по MSKCC]').val("промежуточный");
            $('[name="step3[Комментарий]').val("Постоянно ухудшается");

            this.triggerInputEvent();
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
