import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'logs.index',
            component: require('./views/logs/index.vue')
        }
    ]
});
