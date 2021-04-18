<template>
    <section>
        <h2>Терапия</h2>

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
                    />
                </div>
                <div class="col-auto">мес. с момента постановки диагноза.</div>
            </div>
        </div>

        <div>
            <TherapyLine
                v-for="(therapy, index) in fields['Линии терапии']"
                :stepId="5"
                :index="index"
                :therapy="therapy"
                :key="therapy.uid"
                @remove="removeTherapy(index)"
                @update="updateTherapy(index, $event)"
            ></TherapyLine>
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

            <div class="form-check" v-for="(option, index) in copyrightOptions">
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
            :count="1"
            :prefix="'[sounds]'"
            :accept="'audio/*'"
            label="Прикрепить звуковой файл"
        ></AttachFile>

        <div class="p-4"></div>

        <div class="form-group">
            <button
                type="button"
                class="btn btn-secondary btn-control"
                @click="prev()"
            >
                Назад
            </button>
            <button type="submit" class="btn btn-primary btn-control">
                Сохранить в pdf
            </button>
        </div>
    </section>
</template>

<script>
import TherapyLine from "./TherapyLine";

export default {
    components: { TherapyLine },

    data() {
        return {
            copyrightOptions: [
                "третьими лицам",
                "только лично автором",
                "доступен для ознакомления другим специалистам",
            ],

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

                "Константировано наличие": "",
            });
        },

        removeTherapy(index) {
            this.fields["Линии терапии"].splice(index, 1);
        },

        updateTherapy(index, fields) {
            this.fields["Линии терапии"][index] = fields;
        },

        prev() {
            this.$emit("prev", this.fields);
        },
    },

    beforeMount() {
        this.addTherapy();
    },
};
</script>

<style scoped>
</style>
