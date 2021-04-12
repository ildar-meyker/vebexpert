<template>
    <div>
        <section>
            <h2>Описание случая</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <v-select
                            :options="genderOptions"
                            placeholder="Пол"
                        ></v-select>
                    </div>
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Инициал"
                        />
                    </div>
                    <div class="col">
                        <date-picker placeholder="Год рождения"></date-picker>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            genderOptions: ["Мужчина", "Женщина"],
        };
    },
};
</script>

<style scoped>
</style>
