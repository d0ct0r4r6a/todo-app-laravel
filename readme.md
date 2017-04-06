# Another free and simple client-side to-do lists

## What does it do?

It can do basic stuff a to-do list can do:

- Creating new list
- Editing list title and description
- Deleting list
- Adding task to to-do list
- Mark a task 'Completed' (and unmark it)

And some additional stuff, which may not be essential but you might want to use it:

- Multiple users authentication system
- Active/Completed task filters

## How can I install it locally?

Pre-requisites for installation:

- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer (Preferably the latest stable)

Follow these steps:

1. Clone this repository
2. Go to the local repository directory
3. Open your machine command line (e.g. bash, Power Shell)
4. Run `composer install`
5. Run `php artisan migrate`
6. (Optional) Run `php artisan db:seed` to provide some dummy data

## How does it do it?

All lists and tasks are populated by AJAX (Asynchronous Javascript XML) calls. So after the initial loading of the to-do app, there is no need for any reload. Tasks and lists will be stored in a database you specified in the app `.env` file. That includes the 'Completed' status of each task. 

If you are asking about particular libraries/modules, [jQuery](http://jquery.com/) mostly do all the DOM manipulations as well as AJAX calls. As for the layout, [Bootstrap 3](http://getbootstrap.com/) takes care of it. And as specified in this repo name, the whole app is made with [Laravel 5.4](https://laravel.com/).

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
