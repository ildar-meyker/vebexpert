<template>
    <div class="form-group">
        <label>
            <span v-if="label">
                <b>{{ label }}</b>
            </span>
            <span v-else>
                <b>Прикрепить файл</b> (не более {{ count }} файлов)
            </span>
        </label>

        <div class="files" v-if="files.length">
            <div v-for="(item, index) in files" :key="index">
                <img
                    :src="item.preview"
                    class="preview"
                    v-if="item.hasPreview"
                />
                <span>{{ item.file.name }}</span>
                <button type="button" class="remove" @click="removeFile(index)">
                    ×
                </button>
            </div>
            <div class="p-2"></div>
        </div>

        <div
            v-for="(input, index) in inputs"
            v-show="available > 0 && index === inputs.length - 1"
            :key="index"
        >
            <button type="button" class="btn btn-primary btn-file">
                <span>Обзор</span>
                <input
                    :name="'step' + stepId + '[files][' + index + '][]'"
                    type="file"
                    @change="handleFiles"
                    accept="image/*"
                    multiple
                />
            </button>
        </div>

        <div v-show="available === 0">
            <button type="button" class="btn btn-primary btn-file" disabled>
                Обзор
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["stepId", "label", "count"],

    data() {
        return {
            files: [],
            inputs: [{}],
        };
    },

    computed: {
        available() {
            return this.count - this.files.length;
        },
    },

    methods: {
        handleFiles($event) {
            // slice
            let files = Array.prototype.slice.call(
                $event.target.files,
                0,
                this.available
            );

            // add wrapper
            files = files.map((file) => {
                return {
                    preview: "",
                    hasPreview: false,
                    file,
                };
            });

            files.forEach((file) => {
                this.loadPreview(file);
                this.files.push(file);
            });

            this.addInput();
        },

        removeFile(index) {
            this.files.splice(index, 1);
        },

        loadPreview(file) {
            const reader = new FileReader();

            reader.addEventListener(
                "load",
                function () {
                    file.preview = reader.result;
                    file.hasPreview = true;
                }.bind(this),
                false
            );

            if (file.file && /\.(jpe?g|png|gif)$/i.test(file.file.name)) {
                reader.readAsDataURL(file.file);
            }
        },

        addInput() {
            this.inputs.push({});
        },
    },
};
</script>

<style scoped>
.remove {
    padding: 0 5px;
    background: none;
    border: 0;
    vertical-align: middle;
    font-size: 1.8rem;
    line-height: 1;
    color: #999;
}

.preview {
    width: 80px;
    height: 80px;
    object-fit: cover;
    margin-right: 10px;
}

.files > div {
    margin-bottom: 10px;
}

.files > div:last-child {
    margin-bottom: 0;
}
</style>
