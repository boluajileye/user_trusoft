# Backend


> **Backend Developer Assessment** 
1. Clone the Repository
2. CD into the desired project folder 
3. Install all projects dependencies using `composer install`.
> If you dont have composer installed, download composer with this [link](https://getcomposer.org/download/).
4. Copy the content of `.env.example` and create a `.env`and paste the content
5. Run `php artisan migrate` to create database tables on the database
6. Start backend server locally.. `php artisan serve`. This should startup a local server @ `http://localhost:8000
> make sure MYSQL server has started locally before running the above commands.


# Endpoints.
### Create User

POST
```shell
https://boluajileye.com/user/api/user/add
```
PAYLOAD DATA

```shell
{
    "firstname": "james",
    "lastname": "williams",
    "email": "james@williams.com",
    "age": "34",
    "gender": "male"
}
```
### Read User by user ID

GET
```shell
https://boluajileye.com/user/api/user/{user_id}
```

### Update User by user ID

PUT
```shell
https://boluajileye.com/user/api/user/{user_id}/update
```
PAYLOAD DATA

```shell
{
    "firstname": "james",
    "lastname": "williams",
    "email": "james@williams.com",
    "age": "34",
    "gender": "male"
}
```

### Delete User by user ID

DELETE
```shell
https://boluajileye.com/user/api/user/{user_id}/delete
```
### List all added user.

GET
```shell
https://boluajileye.com/user/api/user 
```


> If an error occur while migrating, cross check the `**.env**`  file and make sure you passed the correct database informations

```