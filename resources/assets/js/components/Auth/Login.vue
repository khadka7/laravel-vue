<template>
    <div>
        <div class="box">
            <h2>Login</h2>
            <hr>

            <form action="" method="post" v-on:submit.prevent="login">
                <div class="alert alert-danger" v-if="errorMessage">
                    {{errorMessage}}
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" v-model="loginItem.email" placeholder="Email" class="form-control">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" v-model="loginItem.password" placeholder="Password" class="form-control">

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
                errorMessage:'',
            }
        },
        methods:{
            login(){
                let  url = backendUrl+"/oauth/token";
                let item = {
                    grant_type:"password",
                    client_id: "2",
                    client_secret:"tUUItCWzTeEkpTHin1IDt8IOrJL6fD5naK3SmOYO",
                    username:this.loginItem.email,
                    password:this.loginItem.password
                };
                axios.post(url,item)
                    .then(response=>{
                        console.log(response);
                        let token = response.data.access_token;
                        let expiry = response.data.expires_in + Date.now();
                        this.$auth.setToken(token,expiry);
                        this.$router.push("/profile");
                        // location.reload();
                    })
                    .catch( error =>{
                        this.errorMessage = error.response.data.message;
                        console.log(this.errorMessage);
                    })
            }
        }
    }
</script>