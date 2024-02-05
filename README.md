# Laravel 10.x

#### Usage
clone the project via git clone or download the zip file.
##### .env
copy contents of .env.example file to .env file. Create a database and connect your database in the .env file. Update the WEATHERAPI_KEY.
##### Composer Install
run the following command into the project directory to install composer packages.
###### composer install
##### Generate Key
then run the following command to generate fresh key.
###### php artisan key:generate
##### Run Migration
then run the following command to create migrations in the database.
###### php artisan migrate
##### Database Seeding
then run the following command to seed the database with dummy content.
###### php artisan db:seed
##### Serve App
then run the following command to serve the app.
###### php artisan serve
##### Jobs
finally run the scheduled commands.
###### php artisan schedule:run
watch a list of scheduled commands.
###### php artisan schedule:list
start the schedule worker (local development)
###### php artisan schedule:work
##### Commands
a list of commands
###### php artisan list
