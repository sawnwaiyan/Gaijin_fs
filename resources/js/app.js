require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import ProductCreateComponent from './components/ProductCreateComponent.vue';
import ProductEditComponent from './components/ProductEditComponent.vue';
import ProductListComponent from './components/ProductListComponent.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'productCreate',
        path: '/productCreate',
        component: ProductCreateComponent
    },
    {
        name: 'productedit',
        path: '/productedit/:id',
        component: ProductEditComponent
    },
    {
        name: 'product',
        path: '/product',
        component: ProductListComponent
    },
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');