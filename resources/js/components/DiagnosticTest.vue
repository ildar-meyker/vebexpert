<template>
    <div class="form-group addon">
        <label>
            Пациент обратился к врачу по месту жительства. При обследовании было
            выявлено:
        </label>
        <div class="row">
            <div class="col-3">
                <div class="form-item">
                    <date-picker
                        valueType="format"
                        placeholder="Дата обследования"
                        v-model="fields['Дата обследования']"
                    ></date-picker>
                </div>
                <div class="form-item">
                    <v-select
                        :options="['МСКТ', 'ПЭТ-КТ', 'МРТ', 'УЗИ']"
                        placeholder="Тип обследования"
                        v-model="fields['Тип обследования']"
                    ></v-select>
                </div>
                <div class="form-item">
                    <v-select
                        :options="[
                            'головного мозга',
                            'органов грудной клетки',
                            'брюшной полости',
                            'малого таза',
                        ]"
                        placeholder="Объект обследования"
                        v-model="fields['Объект обследования']"
                    ></v-select>
                </div>
            </div>
            <div class="col-9">
                <textarea
                    rows="5"
                    class="form-control"
                    placeholder="Описание и заключение"
                    v-model="fields['Описание и заключение']"
                ></textarea>
            </div>
        </div>
        <div class="addon__controls" v-if="index != 0">
            <button type="button" class="addon__remove" @click="remove()">
                ×
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["index", "test"],

    data() {
        return {
            fields: this.test,
        };
    },

    methods: {
        remove() {
            this.$emit("remove");
        },
    },
};
</script>

<style scoped>
</style>
