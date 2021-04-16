<template>
    <div class="form-group addon">
        <div class="row">
            <div class="col-3">
                <div class="form-item">
                    <date-picker
                        :input-attr="{
                            name:
                                'step' +
                                stepId +
                                '[Обследования][' +
                                index +
                                '][Дата]',
                        }"
                        valueType="format"
                        placeholder="Дата"
                        v-model="fields['Дата']"
                    ></date-picker>
                </div>
                <div class="form-item">
                    <v-select
                        :options="['МСКТ', 'ПЭТ-КТ', 'МРТ', 'УЗИ']"
                        placeholder="Тип"
                        v-model="fields['Тип']"
                    ></v-select>
                    <input
                        :name="
                            'step' +
                            stepId +
                            '[Обследования][' +
                            index +
                            '][Тип]'
                        "
                        type="hidden"
                        v-model="fields['Тип']"
                    />
                </div>
                <div class="form-item">
                    <v-select
                        :options="[
                            'головного мозга',
                            'органов грудной клетки',
                            'брюшной полости',
                            'малого таза',
                        ]"
                        placeholder="Объект"
                        v-model="fields['Объект']"
                    ></v-select>
                    <input
                        :name="
                            'step' +
                            stepId +
                            '[Обследования][' +
                            index +
                            '][Объект]'
                        "
                        type="hidden"
                        v-model="fields['Объект']"
                    />
                </div>
            </div>
            <div class="col-9">
                <textarea
                    :name="
                        'step' +
                        stepId +
                        '[Обследования][' +
                        index +
                        '][Описание и заключение]'
                    "
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
    props: ["stepId", "index", "test"],

    data() {
        return {
            fields: _.cloneDeep(this.test),
        };
    },

    watch: {
        test: {
            deep: true,
            handler() {
                this.fields = _.cloneDeep(this.test);
            },
        },

        fields: {
            deep: true,
            handler() {
                this.$emit("update", this.fields);
            },
        },
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
