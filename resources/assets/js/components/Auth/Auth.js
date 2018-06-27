export default function (Vue) {
    Vue.auth = {

        setToken(token,expiry){
            localStorage.setItem('token',token);
            localStorage.setItem('expiry',expiry);
        },

        getToken(){
            let token = localStorage.getItem('token');
            let expiry = localStorage.getItem('expiry');

            if(!token || !expiry){
                return null;
            } else if(Date.now() > parseInt(expiry)){
                this.destroyToken();
                return null;
            }else {
                return token;
            }

        },

        destroyToken(){
            localStorage.removeItem('token');
            localStorage.removeItem('expiry');
        },

        isAuthenticated() {
            if(this.getToken()){
                return true
            }else{
                return false
            }
        }
    }

    Object.defineProperties(Vue.prototype,{
        $auth: {
            get(){
                return Vue.auth;
            }
        }
    })
}

