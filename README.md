<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laragigs

Learn the Laravel PHP framework from scratch by building a job listings application with Laravel 9 and MySQL.

## Tutorial From Traversy Media

[Laravel From Scratch 2022 | 4+ Hour Course](https://www.youtube.com/watch?v=MYyJ4PuL4pY)

## Demo
[laragigs.miguelemmara.me](https://laragigs.miguelemmara.me/)

# Screenshots
![Screenshot 1](https://github.com/MiguelEmmara-ai/dashr/blob/master/public/screenshots/screencapture-laragigs-2022-12-09-21_43_23.png)

Demo login
``` 
username: admin
password: password
```

## Getting Started
```shell
git clone https://github.com/MiguelEmmara-ai/laragigs.git laragigs
cd laragigs
cp .env.example .env
composer install OR composer update
php artisan key:generate
php artisan storage:link
nano .env << Configure .env
```
After opning your .env file, change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

Then we can run
```shell
php artisan migrate:fresh --seed
php artisan optimize:clear
php artisan serve
```

Premade auth
```
email: admin@admin.com
password: password
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
