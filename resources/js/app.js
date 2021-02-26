require('./bootstrap');

import vSelect from 'vue-select'
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'


Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.component('VSelect', vSelect);
Vue.component('VarietyTable', require('./components/VarietyTable.vue').default);

const app = new Vue({
    el: '#app'
});
