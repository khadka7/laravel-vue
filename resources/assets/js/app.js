window.Vue = require('vue');
window.axios = require('axios');

import StarRating from 'vue-star-rating'
import Auth from './components/Auth/Auth.js'
import router from './routes';
import {backendUrl} from "./components/Includes/Constant";

Vue.use(Auth);
Vue.component('star-rating', StarRating);
Vue.use(backendUrl);

// Vue.http.headers.common['Authorization'] = 'Bearer '+ Vue.auth.getToken();

let Myheader = require('./components/Includes/MyHeader');
let Myfooter = require('./components/Includes/MyFooter');

router.beforeEach((to,form,next)=>{
    if(to.matched.some(record => record.meta.forVisitor)){
       if(Vue.auth.isAuthenticated()){
           next({
                path:'/profile'
           })
       }else next()
    } else if(to.matched.some(record => record.meta.forAuth)){
        if(!Vue.auth.isAuthenticated()){
            next({
                path:'/login'
            })
        }else next()
    }else next()
});

const app = new Vue({
    el: '#app',
    router:router,
    components:{Myheader,Myfooter}
});

