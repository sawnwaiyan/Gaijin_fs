import VueRouter from 'vue-router';

import HomeComponent from './components/HomeComponent.vue';
import login from './components/pages/Login';
import user from './components/pages/User';
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
        name: 'login',
        path: '/login',
        component: login
    },
    {
        name: 'user',
        path: '/user',
        component: user,
        meta: {
            requireAuth: true
        }
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

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
});
export default router;