<template>
    <div>
        <h1>Welcome {{user.username}} </h1>

        <table>
            <tr>
                <th>Name:</th>
                <td>{{user.name}}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{user.email}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    import {backendUrl} from "../../Includes/Constant";

    export default {
        data:function () {
            return{
                user:{},
            }
        },
        methods:{
            getUser(){
                let url = backendUrl+"/api/user";
                let Auth = "Bearer "+ this.$auth.getToken();
                axios.get(url,{ 'headers': { 'Authorization': Auth }})
                    .then(response =>{
                        console.log("here",response.data);
                        this.user = response.data;
                    })
            }
        },
        mounted(){
            this.getUser();
        },
    }
</script>