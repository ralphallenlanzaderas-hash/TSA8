# POS Application

A Laravel application with public home and about pages, customer and user account
management, and Laravel Breeze authentication.

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- A database supported by Laravel (SQLite or MySQL)

## Setup

1. Install PHP dependencies:

   ```sh
   composer install
   ```

2. Create the environment file and application key:

   ```sh
   copy .env.example .env
   php artisan key:generate
   ```

   Configure the database settings in `.env`. For a SQLite database, create
   `database/database.sqlite` and set `DB_CONNECTION=sqlite`.

3. Run migrations and load the five sample customer accounts:

   ```sh
   php artisan migrate --seed
   ```

4. Install and build the frontend assets:

   ```sh
   npm install
   npm run build
   ```

5. Start the development server:

   ```sh
   php artisan serve
   ```

Open the URL printed by Artisan. Register an account through the Register link to
sign in and access customer and user account management.

## Main routes

- `/` — home page
- `/about` — about page
- `/customers` — authenticated customer resource
- `/users` — authenticated user resource
- `/login` and `/register` — Breeze authentication

Customer and user records use Laravel resource routes and database-backed CRUD.
The sample customer records are defined in `database/seeders/CustomerSeeder.php`.
"# TSA8" 
