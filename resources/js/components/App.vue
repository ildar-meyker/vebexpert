<template>
    <div class="wrapper">
        <h1>Карточка клинического случая</h1>

        <div class="steps">
            <div
                v-for="step in steps"
                :key="step"
                :class="{ active: step <= currentStep }"
            >
                {{ step }}
            </div>
        </div>

        <component
            v-bind:is="componentName"
            @next="next"
            @prev="prev"
        ></component>
    </div>
</template>

<script>
import Step1 from "./Step1";
import Step2 from "./Step2";
import Step3 from "./Step3";
import Step4 from "./Step4";
import Step5 from "./Step5";

export default {
    components: { Step1, Step2, Step3, Step4, Step5 },
    data() {
        return {
            steps: [1, 2, 3, 4, 5],
            currentStep: 3,

            fields: {},
        };
    },

    computed: {
        componentName() {
            return "Step" + this.currentStep;
        },
    },

    methods: {
        next(fields) {
            this.fields[this.currentStep] = _.cloneDeep(fields);
            this.currentStep++;
        },

        prev(fields) {
            this.fields[this.currentStep] = _.cloneDeep(fields);
            this.currentStep--;
        },
    },
};
</script>

<style scoped>
.wrapper {
    padding: 35px;
    margin: 0 auto;
    max-width: 1200px;
    min-width: 1000px;
}

.steps {
    position: relative;
    display: flex;
    justify-content: space-between;
    margin-bottom: 3rem;
}

.steps::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    border-top: 1px solid #18a0fb;
}

.steps div {
    position: relative;
    width: 42px;
    height: 42px;
    line-height: 42px;
    text-align: center;
    border: 1px solid #18a0fb;
    background: #fff;
    font-size: 18px;
    font-weight: 500;
    box-shadow: 0 0 0 12px #fff;
}

.steps div.active {
    background: #18a0fb;
    color: #fff;
}
</style>
