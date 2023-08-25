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

## Update 2

Now the application provided with Api Documentation, with these urls:

- UI Documentation:
    * http://127.0.0.1:8000/docs/api
- JSON Documentation:
    * http://127.0.0.1:8000/docs/api.json

## Update 3

Implemented advanced user authentication and authorization using Laravel Sanctum's Abilities feature. This secures user access by allowing only authorized users with specific permissions to access relevant endpoints. The system dynamically evaluates and grants access, simplifying permission management for administrators. The enhanced user experience, scalability, and error handling contribute to a secure and efficient system. Comprehensive documentation, audit trails, and monitoring ensure robust security. This upgrade prepares the system for future security challenges and developments.

### Login url:
* http://127.0.0.1:8000/api/login
### Register url:
* http://127.0.0.1:8000/api/register
### Logout url:
* http://127.0.0.1:8000/api/logout

Admin user:
- email: sami@gmail.com
- password: 123123123

he has all permissions 
* blog_post-list
* blog_post-create
* blog_post-update
* blog_post-delete

Normal user:
- email: user@gmail.com
- password: 123123123

he hasn't any permission, so he can't access any endpoint.

## Update 4

Authentication module Converted to DTO & Repository Design Pattern.
