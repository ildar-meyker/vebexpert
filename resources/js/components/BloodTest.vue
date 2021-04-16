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
                            :name="'step' + stepId + '[ОАК][ER]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>1012/л</div>
                </div>

                <div>
                    <div>Hb</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Hb]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>г/л</div>
                </div>

                <div>
                    <div>Le</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Le]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>109/л</div>
                </div>

                <div>
                    <div>Tr</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Tr]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>109/л</div>
                </div>

                <div>
                    <div>СОЭ</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][СОЭ]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>мм/ч</div>
                </div>

                <div>
                    <div>п/я</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][п/я]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>с/я</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][с/я]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Ly</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Ly]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Mo</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Mo]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Bas</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Bas]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Эо</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Эо]'"
                            type="text"
                            class="form-control"
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
                            :name="'step' + stepId + '[ОАК][АсАт][Значение]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>АлАт</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][АлАт][Значение]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>ЛДГ</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][ЛДГ][Значение]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>Скорректированный Ca2+</div>
                    <div>
                        <input
                            :name="
                                'step' +
                                stepId +
                                '[ОАК][Скорректированный Ca2+][Значение]'
                            "
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>мМ/л</div>
                </div>

                <div>
                    <div>Мочевина крови</div>
                    <div>
                        <input
                            :name="
                                'step' +
                                stepId +
                                '[ОАК][Мочевина крови][Значение]'
                            "
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>мМ/л</div>
                </div>

                <div>
                    <div>Креатинин крови</div>
                    <div>
                        <input
                            :name="
                                'step' +
                                stepId +
                                '[ОАК][Креатинин крови][Значение]'
                            "
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>мМ/л</div>
                </div>

                <div>
                    <div>Миелоциты</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Миелоциты]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Метамиел</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Метамиел]'"
                            type="text"
                            class="form-control"
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
                            :name="'step' + stepId + '[ОАК][АсАт][N]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][АлАт][N]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][ЛДГ][N]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="
                                'step' +
                                stepId +
                                '[ОАК][Скорректированный Ca2+][N]'
                            "
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="'step' + stepId + '[ОАК][Мочевина крови][N]'"
                            type="text"
                            class="form-control"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="
                                'step' + stepId + '[ОАК][Креатинин крови][N]'
                            "
                            type="text"
                            class="form-control"
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
    props: ["stepId"],

    data() {
        return {};
    },
};
</script>

<style scoped>
</style>
