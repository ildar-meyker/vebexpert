<template>
    <div class="form-group">
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
                        :options="typeOptions"
                        placeholder="Тип обследования"
                        v-model="fields['Тип обследования']"
                    ></v-select>
                </div>
                <div class="form-item">
                    <v-select
                        :options="objectOptions"
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
        <div class="controls" v-if="index != 0">
            <button type="button" class="controls__remove" @click="remove()">
                ×
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["index"],
    data() {
        return {
            typeOptions: ["МСКТ", "ПЭТ-КТ", "МРТ", "УЗИ"],
            objectOptions: [
                "головного мозга",
                "органов  грудной клетки",
                "брюшной полости",
                "малого таза",
            ],

            fields: {
                "Дата обследования": "",
                "Тип обследования": "",
                "Объект обследования": "",
                "Описание и заключение": "",
            },
        };
    },

    methods: {
        remove() {
            this.$emit("remove");
        },
    },

    watch: {
        fields: {
            handler() {
                this.$emit("update", this.fields);
            },
            deep: true,
        },
    },
};
</script>

<style scoped>
.form-group {
    position: relative;
}

.controls {
    position: absolute;
    top: -10px;
    right: 0;
}

.controls__remove {
    padding: 0 5px;
    background: none;
    border: 0;
    font-size: 1.8rem;
    color: #999;
}
</style>
