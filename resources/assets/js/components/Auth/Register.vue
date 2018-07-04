<template>
    <div>
        <h1>Register</h1>
        <div class="alert alert-success" v-if="successMessage">
            {{successMessage}}
        </div>
        <form action="" method="post" @submit.prevent="register">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" v-model="userItem.username" class="form-control">
                <span v-if="userError.username" v-for="usernameError in userError.username">
                    <ul>
                        <li>{{usernameError}}</li>
                    </ul>
                </span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" v-model="userItem.email" class="form-control">
                <span v-if="userError.email" v-for="emailError in userError.email">
                    <ul>
                        <li>{{emailError}}</li>
                    </ul>

                </span>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" v-model="userItem.name" class="form-control">
                <span v-if="userError.name" v-for="nameError in userError.name">
                    <ul>
                        <li>{{nameError}}</li>
                    </ul>

                </span>

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" v-model="userItem.password" class="form-control">
                <span v-if="userError.password" v-for="passwordError in userError.password">
                    <ul>
                        <li>{{passwordError}}</li>
                    </ul>

                </span>
            </div>

            <input type="submit" value="Register">
        </form>
    </div>
</template>

<script>
    import {backendUrl} from "../Includes/Constant";

    export default {
        data:function () {
            return{
                userItem:{},
                successMessage:"",
                userError:[]
            }
        },
        methods:{
            register(){
                let url = backendUrl+"/api/register";
                this.userError = "";
                axios.post(url,this.userItem)
                    .then(response =>{
                        this.successMessage = response.data.message;
                        this.userItem = "";
                    })
                    .catch(error=>{
                        this.userError = error.response.data.errors;
                            console.log(error.response.data.errors);
                    })
            }
        }
    }
</script>