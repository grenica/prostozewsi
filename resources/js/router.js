import Vue from 'vue';
import VueRouter from 'vue-router';

import Welcome from './views/Welcome.vue';
import LoginForm from './views/LoginForm.vue';
import CategoryDetail from './components/CategoryDetail.vue';
import Logout from './components/Logout.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'welcome',
        component: Welcome
    },
    {
        path: '/about',
        name: 'about',
        component: () => import('./views/About.vue')
    },
    {
        path: '/category/:id',
        name: 'category',
        component: CategoryDetail
    },
    {
        path: '/farmer/:id',
        name: 'farmer',
        component: CategoryDetail
    },
    {
        path: '/login2',
        name: 'login2',
        component: LoginForm
    },
    {
        path: '/cart',
        name: 'cart',
        component: () => import('./views/Cart.vue')
    },
    {
        path: '/product/:id',
        name: 'product',
        component: () => import('./views/Product.vue')
    },
    {
        path: '/thanks',
        name: 'thanks',
        component: () => import('./views/Thanks.vue')
    },
    // {
    //     path: '/logout',
    //     name: 'logout',
    //     component: Logout
    // }
];


const router = new VueRouter({
    mode: 'history',
    routes: routes,
    //akywny link - dodaje klase 'active'
    linkActiveClass: 'active'
});

export default router;
