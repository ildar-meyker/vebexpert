<template>
    <div class="form-group">
        <label>
            <b>{{ label }}</b> {{ max ? "(не более " + max + " файлов)" : "" }}
        </label>

        <div class="files" v-if="attachedFiles.length">
            <div v-for="(item, index) in chosenFiles" :key="index">
                <div v-if="!item.isRemoved">
                    <img
                        :src="item.preview"
                        class="preview"
                        v-if="item.hasPreview"
                    />
                    <span>{{ item.file.name }}</span>
                    <button
                        type="button"
                        class="remove"
                        @click="removeFile(index)"
                    >
                        ×
                    </button>
                </div>
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
                    :name="
                        'step' +
                        stepId +
                        prefix +
                        '[' +
                        name +
                        '][files][' +
                        index +
                        '][]'
                    "
                    type="file"
                    @change="handleFiles"
                    :accept="accept"
                    multiple
                />
            </button>
        </div>

        <div v-show="available === 0">
            <button type="button" class="btn btn-primary btn-file" disabled>
                Обзор
            </button>
        </div>

        <input
            :name="'step' + stepId + prefix + '[' + name + '][counter]'"
            type="text"
            class="out-of-screen"
            :value="attachedFilesCount"
            :data-label="label"
        />

        <input
            :name="'step' + stepId + prefix + '[' + name + '][removed]'"
            type="hidden"
            :value="removedIndexes"
        />
    </div>
</template>

<script>
export default {
    props: {
        stepId: {
            type: Number,
        },
        prefix: {
            type: String,
            default: "",
        },
        name: {
            type: String,
            required: true,
        },
        accept: {
            type: String,
            accept: "*",
        },
        label: {
            type: String,
            default: "Прикрепить файл",
        },
        max: {
            type: Number,
        },
    },

    data() {
        return {
            chosenFiles: [],
            inputs: [{}],
        };
    },

    computed: {
        available() {
            return this.max - this.attachedFiles.length;
        },

        attachedFiles() {
            return this.chosenFiles.filter((file) => {
                return file.isRemoved === false;
            });
        },

        attachedFilesCount() {
            const count = this.attachedFiles.length;
            return count ? count : "";
        },

        removedIndexes() {
            const indexes = [];
            this.chosenFiles.forEach((file, index) => {
                if (file.isRemoved) {
                    indexes.push(index);
                }
            });
            return indexes.join(",");
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
                    isRemoved: false,
                    preview: "",
                    hasPreview: false,
                    file,
                };
            });

            files.forEach((file) => {
                this.loadPreview(file);
                this.chosenFiles.push(file);
            });

            this.addInput();
        },

        removeFile(index) {
            this.chosenFiles[index].isRemoved = true;
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
