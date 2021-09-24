require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import router from './router/router';

Vue.config.productionTip = false;

new Vue({
    el: '#app',
    render: h => h(App),
    router,
});
