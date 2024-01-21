# Laraforum

This is a simple forum made in Laravel. It has basic forum functionality with categories, threads and posts, and also implements a simple friendship system with chat functionality.

## Installation

### Clone this repository:

```git
git clone https://github.com/Quidos/laraforum.git
```

### Install dependencies

```
composer install
```

```
npm install
```

### Set up database connection

Copy '.env.example' into '.env', then set up your database credentials (DB_DATABASE, DB_USERNAME, and DB_PASSWORD)

### Optional: set up default categories

If you want to set up custom categories, change the $categories arra in 'database/seeders/CategorySeeder.php'.

### Run migrations and seed the database

```
php artisan migrate --seed
```

### Start the dev server

```
php artisan serve
```

## Screenshots

### Categories index

![2024-01-21_13-45](https://github.com/Quidos/laraforum/assets/52010846/4d81d7d4-6740-4a3e-aad9-b333711d70b2)

### Threads show

![2024-01-21_13-45_1](https://github.com/Quidos/laraforum/assets/52010846/713f4348-825d-446a-9627-34e882a95c6a)

### User index

![2024-01-21_13-44_1](https://github.com/Quidos/laraforum/assets/52010846/27d05440-0bd9-43ce-b9cc-a3ce407371b0)

### Messages index

![2024-01-21_13-44](https://github.com/Quidos/laraforum/assets/52010846/92d1befd-be7c-4a7d-8ee5-dad4e4f1a89b)
