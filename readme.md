<p align="center">
    <img src="http://www.tandemhrconsultants.com/wp-content/uploads/2018/04/laravel-vue.png">
</p>

> A Laravel-Vue basic project.

## About Project

This project is developed using Laravel 5.6 and Vue.js.
 The concept of this project is to give basic idea of Laravel as Backend and Vue.js as Frontend.

You can find the basic CRUD example with frontend authentication.


## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more.

## Learning Vue.js

Vue is a progressive framework for building user interfaces. [documentation](https://vuejs.org/).

## Features

- Laravel 5.6 
- Basic CRUD
- Image Upload
- Laravel Passport
- Vue + VueRouter 
- Vue Pagination
- Vue Authentication 
- Email Verification

## Installation

Download this repo.

Rename `.env.example` to `.env` and fill the options.

Run the following commands:

```
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan passport:install
php artisan serve
```


## Note 

Please edit your base URL form `Constant.js` in frontend assets file.
And make sure to edit `Login.vue`
``` 
client_id: "client_id",
client_secret: "client_secret"
``` 