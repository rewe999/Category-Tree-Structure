# Tree Structure

This project was made as an recruitment task for [Ideo](https://www.ideo.pl/).
This is a simple application that allows you to manage a tree structure.

To manage/modify our tree, we have to do it from admin panel, which has permissions to add, edit delete and move nodes to other branches.

Regular user can only view the entire tree structure or individual branches.

![screen shot](https://i.ibb.co/C9Kw5dN/NotLogIn.png)
![screen shot](https://i.ibb.co/S0F0drZ/login.png)
![screen shot](https://i.ibb.co/3dN6tYq/admin-Panel.png)
![screen shot](https://i.ibb.co/sQPK9dW/edit.png)

## Installation
### 1. Create `.env` file based on `.env.example`:
Linux:
```shell script
cp .env.example .env
```
Windows:
```shell script
copy .env.example .env
```
### 2. Run containers:
```shell script
docker-compose up -d
```
or
```shell script
./vendor/bin/sail up
```

### 3. Enter the container:
```shell script
docker exec -it (docker_id) /bin/bash
```

### 4. Fetch dependencies:
```shell script
composer install
```

### 5. Generate application key:
```shell script
 php artisan key:generate
```

### 6. Run migrations:
```shell script
 php artisan migrate
```

###To create an administrator account, enter the command:
```shell script
 php artisan createAdmin
```
<sub>and fill in the fields like name, email, password (fields are secured against entering incorrect data)</sup>

### 7. Now you can access the app here:
http://localhost/

## Author:
- [Patryk Zym](https://github.com/rewe999/)
