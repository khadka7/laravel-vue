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
let Products = require('./components/Contents/Product/Products');
let Product = require('./components/Contents/Product/Product');
let PageNotFound = require('./components/PageNotFound');

const routes = [
    { path: '/', component: Home },
    { path: '/products', component: Products },
    { path: '/:id/product', component: Product ,name:'product',props:true},
    { path: "*", component: PageNotFound }
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

