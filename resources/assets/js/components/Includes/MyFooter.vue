<template>
    <footer class="container-fluid text-center bg-lightgray">

        <div class="copyrights" style="margin-top:25px;">
            <p>{{username}} © {{date}}, All Rights Reserved
                <br>
                <span>Web Developed By: {{username}}</span></p>
            <p>
                <a v-bind:href="website" target="_blank">Github 
                    <i class="fa fa-linkedin-square" aria-hidden="true"></i> 
                </a>
            </p>
        </div>
    </footer>

</template>

<script>
    export  default {
        data: function () {
            let date = new Date;
            let fullYear = date.getFullYear();
            return {
                username: 'Sanjay Khadka',
                website:'https://github.com/khadka7/laravel-vue',
                date: fullYear
            }
        },
    }
</script>
