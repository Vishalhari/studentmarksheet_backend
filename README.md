# Student Marksheet backend

This is an application for adding marks of students and manage by registering and then login to application using api done in laravel

## Installation

First add database credentials in .env file

```bash
composer install
```

Then

```bash
php artisan migrate
```

Then

```bash
php artisan db:seed --class=SubjectsSeeder
```

## cross platform

add in cors.php

```

'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],

add fontend base path here
```

## Deployment

```bash
php artisan serve
```

## License

[MIT](https://choosealicense.com/licenses/mit/)
