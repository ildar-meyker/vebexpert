<template>
    <div class="form-group">
        <label><strong>Прикрепить файл</strong> (не более 5 файлов)</label>

        <div class="files" v-if="files.length">
            <div v-for="(file, index) in files" :key="index">
                <img
                    :src="file.preview"
                    class="preview"
                    v-if="file.hasPreview"
                />
                <span>{{ file.file.name }}</span>
                <button type="button" class="remove" @click="removeFile(index)">
                    ×
                </button>
            </div>
            <div class="p-2"></div>
        </div>

        <div>
            <button
                type="button"
                class="btn btn-primary btn-file"
                :disabled="!available"
            >
                <span>Обзор</span>
                <input type="file" @change="addFiles" multiple />
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            maxCount: 5,
            files: [],
        };
    },

    computed: {
        available() {
            return this.maxCount - this.files.length;
        },
    },

    methods: {
        addFiles($event) {
            // slice
            let files = Array.prototype.slice.call(
                $event.target.files,
                0,
                this.available
            );

            // wrap
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
    },

    watch: {
        files() {
            this.$emit("change", this.files);
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
