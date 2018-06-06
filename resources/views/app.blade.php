<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Vue</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

</head>
<body>
<div id="app">
    <v-app>
        <v-content>
            <v-container>
                <div class="header">
                    <Myheader></Myheader>
                    {{--<vue-snotify></vue-snotify>--}}
                </div>
                <router-view></router-view>
                <div class="footer">
                    <Myfooter></Myfooter>
                </div>
            </v-container>
        </v-content>
    </v-app>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>