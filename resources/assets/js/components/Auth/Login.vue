<template>
    <div>
        <div class="box">
            <h2>Login</h2>
            <hr>

            <form action="" method="post" v-on:submit.prevent="login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" v-model="loginItem.email" placeholder="Email" class="form-control">
                    <span class="help-block">

                    </span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" v-model="loginItem.password" placeholder="Password" class="form-control">
                    <span class="help-block">

                    </span>
                </div>

                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {backendUrl} from '../Includes/Constant';

    export default {
        data:function () {
            return{
                loginItem:{},
            }
        },
        methods:{
            login(){
                let  url = backendUrl+"/oauth/token";
                let item = {
                    grant_type:"password",
                    client_id: "2",
                    client_secret:"Ul3dlXLMC2QU0KD5Pfsi2lX4IaSMOHVDEj8lrRCg",
                    username:this.loginItem.email,
                    password:this.loginItem.password
                };
                axios.post(url,item)
                    .then(response=>{
                        let token = response.data.access_token;
                        let expiry = response.data.expires_in + Date.now();
                        this.$auth.setToken(token,expiry)
                    })
                    .catch(error=>{
                        console.log(error)
                    })
            }
        }
    }
</script>