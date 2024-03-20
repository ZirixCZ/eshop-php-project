# Overview

### Database
The database can be easily started with the included docker-compose file. Model.mwb is the MySQL Workbench model file. The database is created from this file.

##### Connection
The connection is done through the PDO library. The connection is established in the `Database` class. This class is a singleton, so the connection is established only once.

### Models
The models are classes that represent the database tables. They are used to interact with the database. The models are located in the `models` directory.

### Views
The views are located in the `views` directory. The views are written in HTML and PHP. The views are used to display the data to the user. There is also a styles.css file. This file is used to style the views.

The MVC pattern is used in this project. The `index.php` file is the entry point of the application. The `index.php` file is used to route the requests to the appropriate controller.

For the hashing of the passwords, the `password_hash` and `password_verify` functions are used. The passwords are hashed with the `PASSWORD_DEFAULT` algorithm.


https://github.com/ZirixCZ/eshop-php-project/assets/49836430/cc17a2bb-26df-4c30-94b5-c5e52ef83030

