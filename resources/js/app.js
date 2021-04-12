require('./bootstrap');


import "bootstrap";
import Vue from 'vue';
import vSelect from 'vue-select';
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/locale/ru";

import App from './components/App';

Vue.component('v-select', vSelect);
Vue.component('date-picker', DatePicker);

new Vue({
    el: '#app',
    components: { App }
});