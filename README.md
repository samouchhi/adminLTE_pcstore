<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# AdminLTE PC Store

A Laravel-based admin dashboard and user management system inspired by AdminLTE, designed for PC store management. This project provides features for managing users, admins, products, categories, and more, with a modern UI and robust backend.

## Features
- Admin and user authentication
- User and admin CRUD operations
- Product and category management
- Role-based access control
- Dashboard with active user/admin stats
- Exception handling and validation
- Responsive UI (AdminLTE theme)
- Database migrations and seeders
- RESTful routes

## Project Structure
```
app/Http/Controllers/         # Controllers for admin, user, etc.
app/Models/                   # Eloquent models (User, Admin, Product, etc.)
database/migrations/          # Database schema migrations
database/seeders/             # Seed data for development
database/factories/           # Model factories for testing
resources/views/              # Blade templates for UI
public/                       # Public assets and entry point
routes/web.php                # Web routes
config/                       # Configuration files
```

## Getting Started

### Prerequisites
- PHP >= 8.0
- Composer
- Node.js & npm
- SQLite (default) or other supported DB

### Installation
1. Clone the repository:
	```sh
	git clone https://github.com/itchhin/adminLTE_pcstore.git
	cd adminLTE_pcstore
	```
2. Install PHP dependencies:
	```sh
	composer install
	```
3. Install Node.js dependencies:
	```sh
	npm install
	```
4. Copy `.env.example` to `.env` and configure your environment variables:
	```sh
	cp .env.example .env
	php artisan key:generate
	```
5. Run migrations and seeders:
	```sh
	php artisan migrate --seed
	```
6. Build frontend assets:
	```sh
	npm run build
	```
7. Start the development server:
	```sh
	php artisan serve
	```

## Usage
- Access the dashboard at `http://localhost:8000`
- Admin login: `/admin/login`
- User management: `/admin/users`
- Admin management: `/admin/admins`

## Testing
Run tests using Pest or PHPUnit:
```sh
php artisan test
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License.
"# adminLTE_pcstore" 
