<template>
    <div>
        <h1>Welcome {{user.username}} </h1>
        <div class="alert alert-success" v-if="successMessage">
            {{successMessage}}
        </div>
        <table>
            <button v-on:click.prevent="editButton" class="btn btn-primary">Edit</button>
            <form method="post" @submit.prevent="update">
                <tr>
                    <th>Name:</th>
                    <template v-if="edit === true">
                        <input type="text" v-model="user.name" class="form-control" required>
                    </template>
                    <template v-else>
                        <td>{{user.name}}</td>
                    </template>
                </tr>

                <tr>
                    <th>Username:</th>
                    <template v-if="edit === true">
                        <input type="text" v-model="user.username" class="form-control" required>
                    </template>
                    <template v-else>
                        <td>{{user.username}}</td>
                    </template>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td>{{user.email}}</td>
                </tr>
                <input type="submit"  class="btn btn-info" value="Update" v-if="edit === true">

            </form>
        </table>
    </div>
</template>

<script>
    import {backendUrl} from "../../Includes/Constant";

    export default {
        data:function () {
            return{
                user:{},
                successMessage:'',
                edit:false,
            }
        },
        methods:{
            getUser(){
                let url = backendUrl+"/api/user";
                let Auth = "Bearer "+ this.$auth.getToken();
                axios.get(url,{ 'headers': { 'Authorization': Auth }})
                    .then(response =>{
                        // console.log("here",response.data);
                        this.user = response.data;
                    })
            },
            editButton(){
                this.edit = true;
            },
            update(){
                let id = this.user.id;
                let url = backendUrl+"/api/"+id+"/update";
                axios.post(url,this.user)
                    .then(response =>{
                        this.successMessage = response.data.message;
                        this.edit = false;
                        this.$router.push("/profile");
                    })
                    .catch(error=>{
                        console.log(error);
                    })
            }
        },
        mounted(){
            console.log(this.$router.currentRoute.name)
            this.getUser();
        },
    }
</script>