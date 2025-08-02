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
