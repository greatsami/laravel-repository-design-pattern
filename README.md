<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Laravel Repository Design Pattern

It is just an example for how to implement:

- Repository Design Pattern. 
- Data Transfer Object.

on one module called BlogPost and implement CRUD operations.

To install the demo on your localhost, please follow this steps:

```
git clone https://github.com/greatsami/laravel-repository-design-pattern.git

cd laravel-repository-design-pattern

composer update [or] composer install

cp .env.example .env 
* dont forget to update Database information.

php artisan key:generate

php artisan migrate --seed

php artisan serve
```

Now, you are ready to use api and test it and learn from this project.

The postman json file is included in the root directory called (Postman-api.json).
