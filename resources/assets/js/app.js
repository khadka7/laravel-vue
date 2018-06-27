window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
import VueRouter from 'vue-router'
import StarRating from 'vue-star-rating'
import Auth from './components/Auth/Auth.js'

// import Vuetify from 'vuetify'

// Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(Auth);
Vue.component('star-rating', StarRating);

let Myheader = require('./components/Includes/MyHeader');
let Myfooter = require('./components/Includes/MyFooter');
let Home = require('./components/Contents/Home');
let Products = require('./components/Contents/Product/Products');
let Product = require('./components/Contents/Product/Product');
let Login = require('./components/Auth/Login');
let PageNotFound = require('./components/PageNotFound');

const routes = [
    { path: '/', component: Home },
    { path: '/products', component: Products },
    { path: '/login', component: Login },
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

