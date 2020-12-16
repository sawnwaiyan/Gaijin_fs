require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Index from './Index';

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import router from './router';
import Vue from 'vue';
Vue.router = router;

Vue.component('Index', Index);
// const app = new Vue(Vue.util.extend({ router }, Index)).$mount('#app');
const app = new Vue({
    el: '#app',
    router,
    component: {
        Index
    }
});