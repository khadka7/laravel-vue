window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'

Vue.use(Vuetify);
Vue.use(VueRouter);

let Myheader = require('./components/Includes/MyHeader');
let Myfooter = require('./components/Includes/MyFooter');

let Home = require('./components/Contents/Home');
let Example = require('./components/Contents/ExampleComponent');


const routes = [
    { path: '/', component: Home },
    { path: '/example', component: Example },
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

const app = new Vue({

    el: '#app',
    router,
    components:{Myheader,Myfooter}
});

