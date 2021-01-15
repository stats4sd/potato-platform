require('./bootstrap');

import vSelect from 'vue-select'
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.component('v-select', vSelect);
Vue.component('variety-catalog', require('./components/VarietyCatalog.vue').default);
Vue.component('variety_table', require('./components/variety_table.vue').default);

const app = new Vue({
    el: '#app' 
});
