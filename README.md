
### Requirements

Programs                | Package
:-----------------------|:----------
 Laravel                | 5.3.x
 PHP   	                | 5.6.x
 MongoDB                | 3.4.x
 Extension PHP MongoDB  | 1.5.x 
 
###Set up database
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