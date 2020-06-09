import Vue from 'vue';
import VueRouter from 'vue-router';
import Welcome from './views/Welcome.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '',
        name: 'welcome',
        component: Welcome
    },
    {
        path: 'about',
        name: 'about',
        component: () => import('./views/About.vue')
    },
    {
        path: 'category/:id',
        name: 'category',
        component: () => import('./components/Categories.vue')
    }
];



const router = new VueRouter({
    routes: routes,
    //akywny link - dodaje klase 'active'
    linkActiveClass: 'active'
});

export default router;
