<template>
    <div class="form-group addon">
        <div class="row">
            <div class="col-9">
                <textarea
                    rows="2"
                    class="form-control"
                    placeholder="Наименование заболевания"
                    v-model="fields['Наименование заболевания']"
                ></textarea>
            </div>
            <div class="col-3">
                <div class="example">
                    <strong>Примечание:</strong> <br />
                    каждый диагноз небходимо писать с новой строки
                </div>
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
    props: ["index", "disease"],

    data() {
        return {
            fields: _.cloneDeep(this.disease),
        };
    },

    methods: {
        remove() {
            this.$emit("remove");
        },
    },

    watch: {
        disease: {
            deep: true,
            handler() {
                this.fields = _.cloneDeep(this.disease);
            },
        },

        fields: {
            deep: true,
            handler() {
                this.$emit("update", this.fields);
            },
        },
    },
};
</script>

<style scoped>
</style>
