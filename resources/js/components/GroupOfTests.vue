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
                        :name="'step' + stepId + '[Биопсия][Объект]'"
                        type="text"
                        class="form-control"
                        placeholder="Наименование органа/ткани"
                    />
                </div>
                <div class="col col-date">
                    <date-picker
                        :input-attr="{
                            name: 'step' + stepId + '[Биопсия][Дата]',
                        }"
                        valueType="format"
                        placeholder="Дата"
                    ></date-picker>
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea
                :name="'step' + stepId + '[Биопсия][Описание и заключение]'"
                rows="3"
                class="form-control"
                placeholder="Описание и заключение"
            ></textarea>
        </div>
    </div>
</template>

<script>
export default {
    props: ["stepId"],

    data() {
        return {};
    },
};
</script>

<style scoped>
</style>
