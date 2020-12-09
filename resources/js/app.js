require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use('VueRouter');

import axios from 'vue-axios';
Vue.use('axios');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import HomeComponent from './components/HomeComponent.vue'
import ProductCreateComponent from './components/ProductCreateComponent.vue';
import ProductEditComponent from './components/ProductEditComponent.vue';
import ProductListComponent from './components/ProductListComponent.vue';


const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    }
];

const router = new VueRouter({ mode: 'history' });
const app = new Vue(Vue.util.extend({ router })).$mount('#app');