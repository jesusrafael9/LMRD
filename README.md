
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

![redis-cli](https://cloud.githubusercontent.com/assets/15696325/21972612/737a52d0-db99-11e6-98d4-6c914c472712.png)


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

You need to install a program that allows you to execute the api methods: you can use advanced REST from google

Example image:

![rest_google_post](https://cloud.githubusercontent.com/assets/15696325/21971746/521d3564-db92-11e6-9f5c-730f4ca0d4d1.png)

**POST/add**:

Making a post from Advanced rest client

- In the resquest field the URL is added to make a post: http: // localhost: 8000 / task

- Then choose the post method

- The api parameters are loaded in the data form option

Example:

![post_rest](https://cloud.githubusercontent.com/assets/15696325/21971910/00e9c6c4-db94-11e6-80fd-c4aa4404c1e2.png)

**GET/search**:

- To do the search, place in the URL:/task/{id}
- Then choose the GET method

![get_rest](https://cloud.githubusercontent.com/assets/15696325/21972361/be97af30-db97-11e6-9bbc-ab1181698fb4.png)

- Get method results

![result_get_rest](https://cloud.githubusercontent.com/assets/15696325/21972415/22498f80-db98-11e6-87e3-6a9190fa84af.png)

**DELETE/destroy**:





















Links relations

install redis: 

https://www.digitalocean.com/community/tutorials/how-to-install-and-use-redis

Advanced rest client:

https://chrome.google.com/webstore/detail/advanced-rest-client/hgmloofddffdnphfgcellkdfbfbjeloo
