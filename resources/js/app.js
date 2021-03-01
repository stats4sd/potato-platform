/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import vSelect from 'vue-select'
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('VSelect', vSelect);
Vue.component('VarietyTable', require('./components/VarietyTable.vue').default);

const app = new Vue({
    el: '#app'
});
