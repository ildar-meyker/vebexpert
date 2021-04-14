<template>
    <div class="form-group">
        <h3>Лабораторные исследования</h3>

        <label>Общий анализ крови</label>

        <div class="blood-row">
            <!--  col 1 -->
            <div class="blood-col">
                <div>
                    <div>ER</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['ER']"
                        />
                    </div>
                    <div>1012/л</div>
                </div>

                <div>
                    <div>Hb</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Hb']"
                        />
                    </div>
                    <div>г/л</div>
                </div>

                <div>
                    <div>Le</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Le']"
                        />
                    </div>
                    <div>109/л</div>
                </div>

                <div>
                    <div>Tr</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Tr']"
                        />
                    </div>
                    <div>109/л</div>
                </div>

                <div>
                    <div>СОЭ</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['СОЭ']"
                        />
                    </div>
                    <div>мм/ч</div>
                </div>

                <div>
                    <div>п/я</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['п/я']"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>с/я</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['с/я']"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Ly</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Ly']"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Mo</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Mo']"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Bas</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Bas']"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Эо</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Эо']"
                        />
                    </div>
                    <div>%</div>
                </div>
            </div>
            <!-- /col 1 -->

            <div class="blood-col"></div>

            <!--  col-2 -->
            <div class="blood-col">
                <div>
                    <div>АсАт</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['АсАт'].value"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>АлАт</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['АлАт'].value"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>ЛДГ</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['ЛДГ'].value"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>Скорректированный Ca2+</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Скорректированный Ca2+'].value"
                        />
                    </div>
                    <div>мМ/л</div>
                </div>

                <div>
                    <div>Мочевина крови</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Мочевина крови'].value"
                        />
                    </div>
                    <div>мМ/л</div>
                </div>

                <div>
                    <div>Креатинин крови</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Креатинин крови'].value"
                        />
                    </div>
                    <div>мМ/л</div>
                </div>

                <div>
                    <div>Миелоциты</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Миелоциты']"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Метамиел</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Метамиел']"
                        />
                    </div>
                    <div>%</div>
                </div>
            </div>
            <!-- /col-2 -->

            <!--  col 3 -->
            <div class="blood-col">
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['АсАт'].N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['АлАт'].N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['ЛДГ'].N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Скорректированный Ca2+'].N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Мочевина крови'].N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            type="text"
                            class="form-control"
                            v-model="fields['Креатинин крови'].N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
            </div>
            <!-- /col 3 -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fields: {
                ER: "",
                Hb: "",
                Le: "",
                Tr: "",
                СОЭ: "",
                "п/я": "",
                "с/я": "",
                Ly: "",
                Mo: "",
                Bas: "",
                Эо: "",

                АсАт: {
                    value: "",
                    N: "",
                },

                АлАт: {
                    value: "",
                    N: "",
                },

                ЛДГ: {
                    value: "",
                    N: "",
                },

                "Скорректированный Ca2+": {
                    value: "",
                    N: "",
                },

                "Мочевина крови": {
                    value: "",
                    N: "",
                },

                "Креатинин крови": {
                    value: "",
                    N: "",
                },

                Миелоциты: "",

                Метамиел: "",
            },
        };
    },

    watch: {
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
