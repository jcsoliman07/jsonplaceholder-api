# 📦 JSONPlaceholder API (Laravel 11 + Custom Auth)

This is a Laravel 11 RESTful API that replicates the structure and data flow of [JSONPlaceholder](https://jsonplaceholder.typicode.com). It supports full CRUD functionality for `Users`, `Posts`, `Comments`, `Albums`, `Photos`, and `Todos`, with **custom-built token authentication** (no Sanctum or OAuth).

---

## 📚 Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Authentication Guide](#authentication-guide)
- [Running the App](#running-the-app)
- [Available API Endpoints](#available-api-endpoints)
- [Postman Collection](#postman-collection)
- [License](#license)

---

## ✅ Features

- RESTful API built with Laravel 11
- Custom authentication (no Laravel Sanctum)
- Full CRUD for:
  - Users
  - Posts
  - Comments
  - Albums
  - Photos
  - Todos
- Easy-to-clone and ready for production/local development
- Docker-compatible (Laravel Sail)

---

## 💻 Requirements

- PHP ^8.2
- Composer
- MySQL / MariaDB
- Git
- Laravel CLI (or Sail for Docker setup)

---

## ⚙️ Installation

### 1. Clone the repository
```bash
git clone https://github.com/your-username/jsonplaceholder-api.git
cd jsonplaceholder-api
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Create Environment File
```bash
cp .env.example .env
```

Then set your DB credentials in .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jsonplaceholder_api
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key 
```bash
php artisan key:generate
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Seed Data from JSONPlaceholder
Run the custom command:

```bash
php artisan jsonplaceholder:fetch
```

This command will fetch data from:

/users
/posts
/comments
/albums
/photos
/todos

...and store it into your local database via Eloquent.

### 7. Seed Data from JSONPlaceholder
```bash
php artisan serve
```







