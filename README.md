# Installing Atur.iot
 <!-- Simple management iot web using Laravel -->
### Requirments
* [Composer](https://getcomposer.org/) to run [Laravel](https://laravel.com/)
* [XAMPP](https://www.apachefriends.org/index.html) for Database
* Text Editor ([Atom](https://atom.io/), [Sublime](https://www.sublimetext.com/), [Notepad++](https://notepad-plus-plus.org/downloads/)) to edit `.env`
* Browser ([Google Chrome](https://www.google.com/chrome/), [Mozilla Firefox](https://www.mozilla.org/en-US/firefox/new/), [Microsoft Edge](https://www.microsoft.com/en-us/edge), [Safari](https://www.apple.com/id/safari/)) to open Project
* [Postman](https://www.postman.com/) to check API
* Internet connection for Install and Update Composer

### How to Install
1. Clone this project to local
2. Prepare a new database
3. Rename `.env.example` in root project directory to `.env`
4. Open `.env` and adjust this section with existing database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
5. Open Command Prompt/Terminal to project directory and type this in order:
	- `composer install` to Install composer for the project
	- `composer update` to Update composer for the project (*)optional
	- `php artisan migrate` to Migrate(creating table and field) database
	- `php artisan db:seed` to Seed(inserting data) database with dummy data
	- `php artisan key:generate` to Generate Laravel key

### How to Run in Web
1. Open Command Prompt/Terminal to project directory and type this:
```
php artisan serve
```
2. Open Browser and type `localhost:8000` as URL
3. You can Register or Login using an existing account:
	- Email: 	`admin@ad.min` `user1@us.er` `user2@us.er`
	- Password: `password`

### How to Run API
1. Open Command Prompt/Terminal to project directory and type this:
```
php artisan serve
```
2. Open Postman and type URL
	- Use `GET` and `localhost:8000/api/logs` to get all data
	- Use `POST` and `localhost:8000/api/logs` to store JSON data using this format:
	```json
	[
	  {"user": "email", "device": "device_credential", "sensor": "sensor_credential", "value": 5},
	  {"user": "email", "device": "device_credential", "sensor": "sensor_credential", "value": 10}
	]
	```