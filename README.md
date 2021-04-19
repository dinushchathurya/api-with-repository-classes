# API exapmle with Laravel Repository Pattern

## Introduction
Laravel API using Repository Design Pattern

## API Endpoints
Method | Route | Description
--- | --- | ---
`POST` | `/api/users` | Create a user
`GET` | `/api/users` | Get All users
`GET` | `/api/users/:id` | Get a single user
`PUT` | `/api/users/:id` | Update user
`DELETE` | `/api/users/:id` | Delete a user

To see all the API Endpoints run below command in your terminal

```
php artisan route:list
```

## Setup
 
```
    $ git clone https://github.com/dinushchathurya/api-with-repository-classes.git
    $ cd api-with-repository-classes
    $ composer install
```
  - Duplicate and save .env.example as .env and fill in environment variables

## Run Migration

```
$ php artisan migrate
```

## Seeding the Database

```
$ php artisan db:seed
```
## Run The Service
```
$ php artisan serve
```

## Author
[Dinush Chathurya](https://dinushchathurya.github.io/)

## License

Copyright (c) 2020 <a href="https://dinushchathurya.github.io/">Dinush Chathurya</a> and <a href="https://codingtricks.io/">codingtricks.io</a>

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

## Blog

https://codingtricks.io/

## 

<p ><h2 align="center">Happy<i class="fa fa-heart" style="color:red;"></i> Coding<i class="fa fa-code" style="color:orange;"> </i></h2></p>


