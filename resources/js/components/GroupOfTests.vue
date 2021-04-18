<template>
    <div>
        <div class="row">
            <div class="col-6" style="padding-right: 30px">
                <div class="form-group">
                    <div class="row">
                        <div class="col col-label">
                            Рентгенография органов грудной клетки
                        </div>
                        <div class="col col-date">
                            <date-picker
                                :input-attr="{
                                    name:
                                        'step' +
                                        stepId +
                                        prefix +
                                        '[Рентгенография][Дата]',
                                }"
                                valueType="format"
                                placeholder="Дата"
                            ></date-picker>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea
                        :name="
                            'step' +
                            stepId +
                            prefix +
                            '[Рентгенография][Описание и заключение]'
                        "
                        rows="5"
                        class="form-control"
                        placeholder="Описание и заключение"
                    ></textarea>
                </div>
            </div>
            <div class="col-6" style="padding-left: 30px">
                <div class="form-group">
                    <div class="row">
                        <div class="col col-label">Сцинтиграфия костей</div>
                        <div class="col col-date">
                            <date-picker
                                :input-attr="{
                                    name:
                                        'step' +
                                        stepId +
                                        prefix +
                                        '[Сцинтиграфия][Дата]',
                                }"
                                valueType="format"
                                placeholder="Дата"
                            ></date-picker>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea
                        :name="
                            'step' +
                            stepId +
                            prefix +
                            '[Сцинтиграфия][Описание и заключение]'
                        "
                        rows="5"
                        class="form-control"
                        placeholder="Описание и заключение"
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
                        :name="'step' + stepId + prefix + '[Биопсия][Объект]'"
                        type="text"
                        class="form-control"
                        placeholder="Наименование органа/ткани"
                    />
                </div>
                <div class="col col-date">
                    <date-picker
                        :input-attr="{
                            name: 'step' + stepId + prefix + '[Биопсия][Дата]',
                        }"
                        valueType="format"
                        placeholder="Дата"
                    ></date-picker>
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea
                :name="
                    'step' +
                    stepId +
                    prefix +
                    '[Биопсия][Описание и заключение]'
                "
                rows="3"
                class="form-control"
                placeholder="Описание и заключение"
            ></textarea>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        stepId: {
            type: Number,
        },
        prefix: {
            type: String,
            default: "",
        },
    },

    data() {
        return {};
    },
};
</script>

<style scoped>
</style>
