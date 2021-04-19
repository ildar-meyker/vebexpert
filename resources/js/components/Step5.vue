<template>
    <section>
        <h2>Терапия</h2>

        <Errors :errors="errors"></Errors>

        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-auto">
                    Химиотерапевтическое лечение было начато через
                </div>
                <div class="col-1">
                    <input
                        name="step5[Лечение начато через]"
                        type="text"
                        class="form-control"
                        data-label="Лечение начато через"
                    />
                </div>
                <div class="col-auto">мес. с момента постановки диагноза.</div>
            </div>
        </div>

        <div>
            <Therapy
                v-for="(therapy, index) in fields['Линии терапии']"
                :stepId="5"
                :index="index"
                :therapy="therapy"
                :key="therapy.uid"
                @remove="removeTherapy(index)"
                @update="updateTherapy(index, $event)"
            ></Therapy>
        </div>

        <div class="p-2"></div>

        <div class="form-group">
            <div class="text-center">
                <button
                    type="button"
                    class="btn btn-primary"
                    @click="addTherapy"
                >
                    Добавить линию терапии
                </button>
            </div>
        </div>

        <div class="p-2"></div>

        <div class="form-group">
            <textarea
                name="step5[Комментарий]"
                class="form-control"
                rows="5"
                placeholder="Комментарий"
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

            <div
                class="form-check"
                v-for="(option, index) in [
                    'третьими лицам',
                    'только лично автором',
                    'доступен для ознакомления другим специалистам',
                ]"
                :key="index"
            >
                <input
                    name="step5[Копирайт][]"
                    class="form-check-input"
                    type="checkbox"
                    :id="`copyright${index}`"
                    :value="option"
                />
                <label class="form-check-label" :for="`copyright${index}`">
                    {{ option }}
                </label>
            </div>
        </div>

        <div class="p-2"></div>

        <AttachFile
            :stepId="5"
            :name="'sounds'"
            :max="1"
            :label="'Прикрепить звуковой файл'"
            :accept="'audio/*'"
        ></AttachFile>

        <div class="p-4"></div>

        <NavButtons
            :env="env"
            :stepId="stepId"
            @prev="prev"
            @next="next"
            @fill="fill"
            @submit="submit"
        ></NavButtons>
    </section>
</template>

<script>
import Therapy from "./Therapy";
import mixins from "./mixins";

export default {
    mixins: [mixins],

    components: { Therapy },

    props: {
        env: {
            type: String,
        },
    },

    data() {
        return {
            stepId: 5,
            errors: [],

            fields: {
                "Линии терапии": [],
            },
        };
    },

    methods: {
        addTherapy() {
            this.fields["Линии терапии"].push({
                uid: _.uniqueId(),

                Препарат: "",

                "Обоснование выбора": "",

                "Изменение состояния": "",

                "Ухудшение связано с": "",

                "Побочные эффекты": "",

                "Принято решение о": "",

                "Cнижение дозы препарата": {
                    c: "",
                    до: "",
                },

                "Лечение было": "",

                "Лечение возобновлено": {
                    "через недель": "",
                    "в дозе": "",
                },

                Комментарий: "",

                Обследования: [],

                "Констатировано наличие": "",
            });
        },

        removeTherapy(index) {
            this.fields["Линии терапии"].splice(index, 1);
        },

        updateTherapy(index, fields) {
            this.fields["Линии терапии"][index] = fields;
        },

        fill() {
            $('[name="step5[Лечение начато через]').val(12);
            $('[name="step5[Линии терапии][0][Препарат]').val("акситиниба");
            $('[name="step5[Линии терапии][0][Обоснование выбора]').val(
                "акситиниба"
            );
            $('[name="step5[Линии терапии][0][Изменение состояния]').val(
                "улучшилось"
            );
            $('[name="step5[Линии терапии][0][Комментарий]').val("улучшилось");

            $('[name="step5[Линии терапии][0][Обследования][0][Дата]"]').val(
                "2020-10-07"
            );
            $('[name="step5[Линии терапии][0][Обследования][0][Тип]"]').val(
                "МСКТ"
            );
            $('[name="step5[Линии терапии][0][Обследования][0][Объект]"]').val(
                "головного мозга"
            );
            $(
                '[name="step5[Линии терапии][0][Обследования][0][Описание и заключение]"]'
            ).val("Постоянно ухудшается");
            $('[name="step5[Линии терапии][0][Рентгенография][Дата]"]').val(
                "2020-10-07"
            );
            $(
                '[name="step5[Линии терапии][0][Рентгенография][Описание и заключение]"]'
            ).val("Состояние ухудшается");
            $('[name="step5[Линии терапии][0][Сцинтиграфия][Дата]"]').val(
                "2020-10-07"
            );
            $(
                '[name="step5[Линии терапии][0][Сцинтиграфия][Описание и заключение]"]'
            ).val("Онемение рук и ног");
            $('[name="step5[Линии терапии][0][Биопсия][Дата]"]').val(
                "2020-10-07"
            );
            $('[name="step5[Линии терапии][0][Биопсия][Объект]"]').val(
                "Пищевода"
            );
            $(
                '[name="step5[Линии терапии][0][Биопсия][Описание и заключение]"]'
            ).val("Раздражение слизистых");

            $('[name="step5[Линии терапии][0][ОАК][ER]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Hb]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Le]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Tr]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][СОЭ]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][п/я]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][с/я]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Ly]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Mo]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Bas]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Эо]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][АсАт][Значение]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][АсАт][N]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][АлАт][Значение]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][АлАт][N]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][ЛДГ][Значение]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][ЛДГ][N]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $(
                '[name="step5[Линии терапии][0][ОАК][Скорректированный Ca2+][Значение]"]'
            ).val(_.random(1.2, 5.6).toFixed(2));
            $(
                '[name="step5[Линии терапии][0][ОАК][Скорректированный Ca2+][N]"]'
            ).val(_.random(1.2, 5.6).toFixed(2));
            $(
                '[name="step5[Линии терапии][0][ОАК][Мочевина крови][Значение]"]'
            ).val(_.random(1.2, 5.6).toFixed(2));
            $('[name="step5[Линии терапии][0][ОАК][Мочевина крови][N]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $(
                '[name="step5[Линии терапии][0][ОАК][Креатинин крови][Значение]"]'
            ).val(_.random(1.2, 5.6).toFixed(2));
            $('[name="step5[Линии терапии][0][ОАК][Креатинин крови][N]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Миелоциты]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );
            $('[name="step5[Линии терапии][0][ОАК][Метамиел]"]').val(
                _.random(1.2, 5.6).toFixed(2)
            );

            $('[name="step5[Констатировано наличие]').val("частичного ответа");
            $('[name="step5[Комментарий]').val("все плохо");

            this.triggerInputEvent();
        },
    },

    beforeMount() {
        this.addTherapy();
    },
};
</script>

<style scoped>
</style>
