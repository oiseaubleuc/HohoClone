<h1 align="center">HohoClone</h1>
<p align="center">
  <b>Social network built with Laravel, Docker and CI/CD</b><br/>
  A Twitter-style platform with posts, comments, likes and private messages, shipped through an automated test and Docker build pipeline.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=flat-square&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Docker-compose-2496ED?style=flat-square&logo=docker&logoColor=white" />
  <img src="https://img.shields.io/badge/GitHub%20Actions-CI%2FCD-2088FF?style=flat-square&logo=githubactions&logoColor=white" />
</p>

---

## Features

- Registration, login and user profiles
- Posts and tweets with comments and likes
- Private messages between users
- Containerized development and production environment

## CI/CD

| Workflow | What it does |
|---|---|
| `laravel.yml` | Installs dependencies and runs the test suite on every push and pull request |
| `docker-image.yml` | Builds the Docker image to guarantee the app always ships in a working container |

## Tech stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11, PHP 8.3 |
| Frontend | Blade, Vite |
| Containers | Docker, Docker Compose |
| CI/CD | GitHub Actions |

## Getting started

**With Docker**

```bash
git clone https://github.com/oiseaubleuc/HohoClone.git
cd HohoClone
docker compose up -d --build
```

**Without Docker**

```bash
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

<p align="center">Built by <a href="https://github.com/oiseaubleuc">Hoho</a> · Belgium</p>
