require('./bootstrap');

import Vue from 'vue';

import router from 'vue-router';
Vue.use('router');

import axios from 'vue-axios';
Vue.use('axios');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
