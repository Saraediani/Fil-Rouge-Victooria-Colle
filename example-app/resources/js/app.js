require('./bootstrap');

import Vue from 'vue';
import vmodal from 'vue-js-modal';

import VueRouter from 'vue-router';

import routes from './routes';

import App from './app.vue';

Vue.use(VueRouter);
Vue.use(vmodal, {
    dynamicDefaults: {
        height: 'auto'
    }
});


const router = new VueRouter({
    mode: 'history',
    routes
});

new Vue({
    render: h => h(App),
    router
}).$mount("#app")


