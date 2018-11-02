<p align="center"><a href="https://laravel.com" target="_blank"><img width="150"src="https://laravel.com/laravel.png"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Vault
This app was made with Laravel and limited Vue.js

## Startup

#### Step 1:
`composer update`


#### Step 2:
Build the .env file

This will generate a new key for you which you can copy paste into your .env file:

`php artisan key:generate`

Add the following line (with the generate key) to the .env file

`APP_KEY=YOUR_GENERATED_KEY`

Now you need a google captcha sitekey and secret and add them to the following lines:

`NOCAPTCHA_SECRET=6LeRuQsUAAAAALBGvdwZw1NB8Nt4qVbkmSb6xb-0
 NOCAPTCHA_SITEKEY=6LeRuQsUAAAAAMUKyVXQQL5yaNYaejdSVKLOH5I6`
 
And lastly build up the database configuration with your database settings:

`DB_CONNECTION=mysql
 DB_HOST=localhost
 DB_PORT=3306
 DB_DATABASE=vault
 DB_USERNAME=homestead
 DB_PASSWORD=secret`
 
 The rest can be copied over from the .env-example file


#### Step 3:
`php artisan migrate`

## Optional


#### Step 4:
<p>
Make users in the database with:
</p>

`php artisan db:seed`

Note: The users will have a randomized e-mail/name and the password 'secret', ONLY USE FOR TESTING PURPOSES

#### Step 5:
<p>
If there are troubles with the scripting or styling run:
</p>

`npm install`

And then:

`gulp`

#### Good luck!