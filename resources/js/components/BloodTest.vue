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
                            :name="'step' + stepId + prefix + '[ОАК][ER]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][ER]'
                                    ],
                                },
                            ]"
                            data-label="ER"
                        />
                    </div>
                    <div>1012/л</div>
                </div>

                <div>
                    <div>Hb</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Hb]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][Hb]'
                                    ],
                                },
                            ]"
                            data-label="Hb"
                        />
                    </div>
                    <div>г/л</div>
                </div>

                <div>
                    <div>Le</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Le]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][Le]'
                                    ],
                                },
                            ]"
                            data-label="Le"
                        />
                    </div>
                    <div>109/л</div>
                </div>

                <div>
                    <div>Tr</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Tr]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][Tr]'
                                    ],
                                },
                            ]"
                            data-label="Tr"
                        />
                    </div>
                    <div>109/л</div>
                </div>

                <div>
                    <div>СОЭ</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][СОЭ]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][СОЭ]'
                                    ],
                                },
                            ]"
                            data-label="СОЭ"
                        />
                    </div>
                    <div>мм/ч</div>
                </div>

                <div>
                    <div>п/я</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][п/я]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][п/я]'
                                    ],
                                },
                            ]"
                            data-label="п/я"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>с/я</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][с/я]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][с/я]'
                                    ],
                                },
                            ]"
                            data-label="с/я"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Ly</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Ly]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][Ly]'
                                    ],
                                },
                            ]"
                            data-label="Ly"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Mo</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Mo]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][Mo]'
                                    ],
                                },
                            ]"
                            data-label="Mo"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Bas</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Bas]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][Bas]'
                                    ],
                                },
                            ]"
                            data-label="Bas"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div>Эо</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Эо]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' + stepId + prefix + '[ОАК][Эо]'
                                    ],
                                },
                            ]"
                            data-label="Эо"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div class="blood-110">Миелоциты</div>
                    <div>
                        <input
                            :name="
                                'step' + stepId + prefix + '[ОАК][Миелоциты]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Миелоциты]'
                                    ],
                                },
                            ]"
                            data-label="Миелоциты"
                        />
                    </div>
                    <div>%</div>
                </div>

                <div>
                    <div class="blood-110">Метамиел</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][Метамиел]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Метамиел]'
                                    ],
                                },
                            ]"
                            data-label="Метамиел"
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
                            :name="
                                'step' +
                                stepId +
                                prefix +
                                '[ОАК][АсАт][Значение]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][АсАт][Значение]'
                                    ],
                                },
                            ]"
                            data-label="АсАт"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>АлАт</div>
                    <div>
                        <input
                            :name="
                                'step' +
                                stepId +
                                prefix +
                                '[ОАК][АлАт][Значение]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][АлАт][Значение]'
                                    ],
                                },
                            ]"
                            data-label="АлАт"
                        />
                    </div>
                    <div>Eд/л</div>
                </div>

                <div>
                    <div>ЛДГ</div>
                    <div>
                        <input
                            :name="
                                'step' +
                                stepId +
                                prefix +
                                '[ОАК][ЛДГ][Значение]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][ЛДГ][Значение]'
                                    ],
                                },
                            ]"
                            data-label="ЛДГ"
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
                                prefix +
                                '[ОАК][Скорректированный Ca2+][Значение]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Скорректированный Ca2+][Значение]'
                                    ],
                                },
                            ]"
                            data-label="Скорректированный Ca2+"
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
                                prefix +
                                '[ОАК][Мочевина крови][Значение]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Мочевина крови][Значение]'
                                    ],
                                },
                            ]"
                            data-label="Мочевина крови"
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
                                prefix +
                                '[ОАК][Креатинин крови][Значение]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Креатинин крови][Значение]'
                                    ],
                                },
                            ]"
                            data-label="Креатинин крови"
                        />
                    </div>
                    <div>мМ/л</div>
                </div>

                <div>
                    <div>Общий белок</div>
                    <div>
                        <input
                            :name="
                                'step' +
                                stepId +
                                prefix +
                                '[ОАК][Общий белок][Значение]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Общий белок][Значение]'
                                    ],
                                },
                            ]"
                            data-label="Общий белок"
                        />
                    </div>
                    <div>г/л</div>
                </div>
            </div>
            <!-- /col-2 -->

            <!--  col 3 -->
            <div class="blood-col">
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][АсАт][N]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][АсАт][N]'
                                    ],
                                },
                            ]"
                            data-label="АсАт N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][АлАт][N]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][АлАт][N]'
                                    ],
                                },
                            ]"
                            data-label="АлАт N"
                        />
                    </div>
                    <div>Eд/л)</div>
                </div>
                <div>
                    <div>(N =</div>
                    <div>
                        <input
                            :name="'step' + stepId + prefix + '[ОАК][ЛДГ][N]'"
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][ЛДГ][N]'
                                    ],
                                },
                            ]"
                            data-label="ЛДГ N"
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
                                prefix +
                                '[ОАК][Скорректированный Ca2+][N]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Скорректированный Ca2+][N]'
                                    ],
                                },
                            ]"
                            data-label="Скорректированный Ca2+ N"
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
                                prefix +
                                '[ОАК][Мочевина крови][N]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Мочевина крови][N]'
                                    ],
                                },
                            ]"
                            data-label="Мочевина крови N"
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
                                prefix +
                                '[ОАК][Креатинин крови][N]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Креатинин крови][N]'
                                    ],
                                },
                            ]"
                            data-label="Креатинин крови N"
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
                                prefix +
                                '[ОАК][Общий белок][N]'
                            "
                            type="text"
                            :class="[
                                'form-control',
                                {
                                    error: !!errors[
                                        'step' +
                                            stepId +
                                            prefix +
                                            '[ОАК][Общий белок][N]'
                                    ],
                                },
                            ]"
                            data-label="Общий белок N"
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
    props: {
        errors: {
            type: Object,
        },
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
