
### Requirements

Programs                | Version
:-----------------------|:----------
 Apache                 | 2.4.x
 PHP   	                | 5.6.x
 MongoDB                | 3.4.x
 Extension PHP5 MongoDB | 1.5.x 
 Redis 					| 3.2.X 
 Composer 				| 1.3.x
 Laravel                | 5.3.x
 
###Set up database
Start the mongodb service
```bash
service mongod start

```

Enter the mongo shell and create the database

```bash
mongo
MongoDB shell version v3.4.1
connecting to: mongodb://127.0.0.1:27017
MongoDB server version: 3.4.1
>
```
Create database

```bash
>use test_jesus
```

Create user, for connection with mongo 

```bash
>db.createUser({ user: "jesus", pwd: "123", roles: [ { role: "readWrite", db: "test_jesus" }]});
```
###Configure laravel with database

Open the file .env and edit the parameters

```php
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=test_jesus
DB_USERNAME=jesus
DB_PASSWORD=123
```
Open shell, go to app path

```shell
cd test_jesus
```
Run artisan migrate to create collections in mongodb next to the seeders

```shell
php artisan migrate:refresh --seed
```

###Start laravel

To start the laravel service the following command is executed

```shell
php artisan server
Laravel development server started on http://127.0.0.1:8000/
```

Open the browser with the URL:
http://127.0.0.1:8000/

###See task list from redis service

Enter the redis shell

```shell
redis-cli
```

View task list all
```shell
get tasks:index
```

###Api Rest handling from laravel

Verifying the system routes in laravel

```shell
php artisan route:list
+--------+----------+-----------+------+---------------------------------------------+--------------+
| Domain | Method   | URI       | Name | Action                                      | Middleware   |
+--------+----------+-----------+------+---------------------------------------------+--------------+
|        | GET|HEAD | /         |      | Closure                                     | web          |
|        | GET|HEAD | api/user  |      | Closure                                     | api,auth:api |
|        | POST     | task      |      | App\Http\Controllers\TaskController@store   | web          |
|        | PUT      | task      |      | App\Http\Controllers\TaskController@store   | web          |
|        | GET|HEAD | task/{id} |      | App\Http\Controllers\TaskController@show    | web          |
|        | DELETE   | task/{id} |      | App\Http\Controllers\TaskController@destroy | web          |
|        | GET|HEAD | tasks     |      | App\Http\Controllers\TaskController@index   | web          |
+--------+----------+-----------+------+---------------------------------------------+--------------+
```















Links relations

install redis: 

https://www.digitalocean.com/community/tutorials/how-to-install-and-use-redis
