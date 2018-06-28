<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link to="/">
            <a class="navbar-brand">Navbar</a>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <router-link to="/">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </router-link>
                <template v-for="content in contents">
                    <router-link :to="{ path: '/'+content}">
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{content | capitalize}}</a>
                        </li>
                    </router-link>
                </template>

                 <template v-if="!this.$auth.isAuthenticated()">
                     <template v-for="content in visitorContents">
                         <router-link :to="{ path: '/'+content}">
                             <li class="nav-item">
                                 <a class="nav-link" href="#">{{content | capitalize}}</a>
                             </li>
                         </router-link>
                     </template >
                 </template>

                <template v-if="this.$auth.isAuthenticated()">
                    <template v-for="content in authContents">
                        <router-link :to="{ path: '/'+content}">
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{content | capitalize}}</a>
                            </li>
                        </router-link>
                    </template>
                </template>

                <div v-if="this.$auth.isAuthenticated()" v-on:click.prevent="logout">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>

</template>

<script>
    export default{

        data:function () {
            return{
                contents:['products'],
                visitorContents:['login','register'],
                authContents:['profile']
            }
        },
        methods:{
            logout(){
               this.$auth.destroyToken();
               this.$router.push("/");
               location.reload();
            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },

    }
</script>

