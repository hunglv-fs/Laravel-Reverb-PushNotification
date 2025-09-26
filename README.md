<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel 12

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

### Setup project
1. Clone this repository
```bash
git clone <github-url>
```
2. Copy `.env.example` to `.env` and set your environment variables
```bash
cp .env.example .env
```
3. Build and start the Docker containers
```bash
docker-compose up -d --build
```
4. Install PHP dependencies
```bash
docker-compose exec app composer install
```
5. Generate application key
```bash
docker-compose exec app php artisan key:generate
```
6. Run database migrations and seeders
```bash
docker-compose exec app php artisan migrate --seed
```
7. Access the application at `http://localhost:8083` and phpMyAdmin at `http://localhost:8084`
### Features
- PHP 8.3
- MySQL 8.0
- phpMyAdmin
- Laravel 12
- Reverb for real-time notifications
- Tailwind CSS
- Alpine.js
- Laravel Breeze for authentication scaffolding
- Dockerized environment for easy setup and deployment
### Real-time Notifications
This project includes a simple implementation of real-time notifications using Reverb. You can send notifications from
the `/notifications/send` endpoint, and they will be broadcasted to all connected clients.
