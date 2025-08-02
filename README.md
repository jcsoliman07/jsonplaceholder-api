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

🔐 Authentication Guide
Basic Authentication
This API uses HTTP Basic Authentication via a custom guard. To test protected routes:

Create a user manually:

```bash
php artisan tinker

>>> \App\Models\User::create([
    'name' => 'John Doe',
    'username' => 'johndoe',
    'email' => 'john@example.com',
    'password' => bcrypt('secret'),
]);

```


📡 API Endpoints

| Method | Endpoint                       | Description                |
| ------ | ------------------------------ | -------------------------- |
| GET    | `/api/users`                   | List all users             |
| GET    | `/api/posts`                   | List all posts             |
| GET    | `/api/comments`                | List all comments          |
| GET    | `/api/albums`                  | List all albums            |
| GET    | `/api/photos`                  | List all photos            |
| GET    | `/api/todos`                   | List all todos             |
| GET    | `/api/posts/{postId}/comments` | Comments for specific post |


🔐 Protected Routes (Requires Basic Auth)
Use HTTP Basic Auth with your user's email and password.

| Method | Endpoint          | Description   |
| ------ | ----------------- | ------------- |
| POST   | `/api/posts`      | Create a post |
| PUT    | `/api/posts/{id}` | Update a post |
| DELETE | `/api/posts/{id}` | Delete a post |


## 📦 Technologies Used

- **Laravel 11**  
- **PHP 8.3**  
- **MySQL**  
- **Custom Basic Authentication**  
- **Artisan Console Commands**  
- **RESTful API Design**  

---

## 📁 Folder Structure

- `app/Console/Commands/` – Custom command to fetch data  
- `app/Models/` – Eloquent models for each entity  
- `routes/api.php` – API route definitions  
- `app/Http/Controllers/` – Resource controllers  

---

## ✅ To Do

- Fetch & store remote data  
- Expose RESTful endpoints  
- Implement HTTP Basic Authentication  
- Protect specific routes  
- Provide documentation  

## 🐳 Docker Setup (One-Time Copy-Paste)

1. **Start Docker containers**

```bash
./vendor/bin/sail up -d
```

2. Run database migrations

```bash
Copy
Edit
./vendor/bin/sail artisan migrate
```
3. (Optional) Seed the database

```bash
Copy
Edit
./vendor/bin/sail artisan db:seed
```

4. Stop Docker containers

```bash
Copy
Edit
./vendor/bin/sail down
```

⚠️ Notes:
Make sure Docker Desktop is running before executing these commands.

If port 3306 is already in use on your host machine, update the MySQL port mapping in docker-compose.yml and your .env file accordingly.

Use the following command to check the status of your running containers:

```bash
Copy
Edit
./vendor/bin/sail ps
```
