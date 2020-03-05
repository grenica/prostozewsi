import Vue from 'vue';
import VueRouter from 'vue-router';

import Welcome from './views/Welcome.vue';
import CategoryDetail from './components/CategoryDetail.vue';

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
    }
];


const router = new VueRouter({
    // mode: 'history',
    routes: routes,
    //akywny link - dodaje klase 'active'
    linkActiveClass: 'active'
});

export default router;
