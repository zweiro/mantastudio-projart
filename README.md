# Manta Studio - ProjArt - Quiz web app

## About
This is a city-based quiz web application developed during an academic project called "ProjArt" from the HEIG-VD HES.

## Setup
1. first clone the project.

2. create a `.env` file from the model `.env.example`

3. Install the dependencies:

  ```
  composer install
  ```

  then

  ```
  npm install
  ```

4. Generate the APP_KEY environment variable

  ```
  php artisan key:generate
  ```

5. Generate the migrations table

  ```
  php artisan migrate:install
  ```

6. Run the migrations with seeders

  ```
  php artisan migrate --seed
  ```

You're ready to go !

## Run the application
1. Build your js assets

  ```
  npm run watch
  ```

2. Run the laravel internal sever

  ```
  php artisan serve
  ```

   


