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
                <div v-for="content in contents">
                <router-link :to="{ path: '/'+content}">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{content | capitalize}}</a>
                    </li>
                </router-link>
             </div>
            </ul>
        </div>
    </nav>

</template>

<script>
    export default{
        data:function () {
            return{
                contents:['products','login']
            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        }
    }
</script>

