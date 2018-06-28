
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

let Home = require('./components/Contents/Home');
let Products = require('./components/Contents/Product/Products');
let Product = require('./components/Contents/Product/Product');
let Login = require('./components/Auth/Login');
let Register = require('./components/Auth/Register');
let Profile = require('./components/Contents/Users/Profile');
let PageNotFound = require('./components/PageNotFound');

const routes = [
    { path: '/', component: Home },
    { path: '/products', component: Products },
    { path: '/login', component: Login ,meta:{forVisitor:true}},
    { path: '/register', component: Register ,meta:{forVisitor:true}},
    { path: '/profile', component: Profile,meta:{forAuth:true} },
    { path: '/:id/product', component: Product ,name:'product',props:true },
    { path: "*", component: PageNotFound }
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});


export default router