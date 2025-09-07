# Rose - Modern Web Application

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="120">
  <img src="https://adminlte.io/wp-content/uploads/2019/05/AdminLTE-Logo.png" alt="AdminLTE" width="200">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Tailwind_CSS_logo.svg/2048px-Tailwind_CSS_logo.svg.png" alt="Tailwind CSS" width="200">
</p>

## 📋 Table of Contents
- [Project Overview](#-project-overview)
- [✨ Features](#-features)
- [🚀 Tech Stack](#-tech-stack)
- [⚙️ Prerequisites](#️-prerequisites)
- [🛠️ Installation](#️-installation)
- [🔧 Configuration](#-configuration)
- [🏗️ Development](#️-development)
- [🧪 Testing](#-testing)
- [🌐 Production Deployment](#-production-deployment)
- [📝 License](#-license)

## 🌟 Project Overview

Rose is a modern web application built with Laravel, featuring a responsive admin dashboard powered by AdminLTE and a sleek frontend with Tailwind CSS. The application provides a robust foundation for building enterprise-level web applications with user authentication, contact forms, and more.

## ✨ Features

- **User Authentication**
  - Login/Registration system
  - Password reset functionality
  - Email verification
  - Role-based access control (RBAC)

- **Contact Management**
  - Contact form with validation
  - Form submission tracking
  - Admin dashboard for message management

- **Responsive Design**
  - Mobile-first approach
  - Clean and intuitive UI/UX
  - Dark/Light mode support

- **Developer Friendly**
  - Comprehensive logging
  - Error tracking
  - API ready

## 🚀 Tech Stack

### Backend
- **PHP 8.2+**
- **Laravel 12.x** - The PHP Framework For Web Artisans
- **MySQL/PostgreSQL** - Database
- **Laravel Breeze** - Authentication scaffolding

### Frontend
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Minimal framework for JavaScript behavior
- **Vite** - Next Generation Frontend Tooling
- **AdminLTE** - Admin dashboard template

### Development Tools
- **Docker** - Containerization
- **Git** - Version control
- **Composer** - PHP dependency manager
- **NPM** - JavaScript package manager

## ⚙️ Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP 8.2 or higher
- Composer
- Node.js (v18+)
- NPM or Yarn
- MySQL/PostgreSQL
- Web server (Nginx/Apache) with PHP-FPM
- Git

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/rose.git
   cd rose
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure your database**
   Update your `.env` file with your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rose
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate --seed
   ```

7. **Compile assets**
   For development:
   ```bash
   npm run dev
   ```
   
   For production:
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

9. **Access the application**
   Open your browser and visit: [http://localhost:8000](http://localhost:8000)

## 🔧 Configuration

### Environment Variables

Key environment variables to configure in your `.env` file:

```
APP_NAME=Rose
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rose
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## 🏗️ Development

### Code Style
This project follows PSR-12 coding standards. To check and fix code style:

```bash
composer cs-check    # Check code style
composer cs-fix     # Fix code style issues
```

### Git Workflow
1. Create a new branch for your feature:
   ```bash
   git checkout -b feature/your-feature-name
   ```
2. Make your changes and commit them:
   ```bash
   git add .
   git commit -m "Add your commit message"
   ```
3. Push to the branch:
   ```bash
   git push origin feature/your-feature-name
   ```
4. Create a Pull Request

## 🧪 Testing

Run the test suite:

```bash
composer test
```

For test coverage:
```bash
composer test-coverage
```

## 🌐 Production Deployment

### Requirements
- Linux server (Ubuntu 22.04 LTS recommended)
- Nginx/Apache
- PHP 8.2+ with required extensions
- MySQL/PostgreSQL
- Node.js 18+ and NPM
- Composer

### Deployment Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/rose.git /var/www/rose
   cd /var/www/rose
   ```

2. **Install dependencies**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   ```

3. **Set up environment**
   ```bash
   cp .env.example .env
   nano .env  # Update with production values
   php artisan key:generate
   ```

4. **Set permissions**
   ```bash
   chown -R www-data:www-data /var/www/rose
   chmod -R 775 /var/www/rose/storage
   chmod -R 775 /var/www/rose/bootstrap/cache
   ```

5. **Optimize the application**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

6. **Set up the queue worker** (if using queues)
   ```bash
   sudo nano /etc/supervisor/conf.d/rose-worker.conf
   ```
   Add:
   ```
   [program:rose-worker]
   process_name=%(program_name)s_%(process_num)02d
   command=php /var/www/rose/artisan queue:work --sleep=3 --tries=3 --max-time=3600
   autostart=true
   autorestart=true
   stopasgroup=true
   killasgroup=true
   user=www-data
   numprocs=8
   redirect_stderr=true
   stdout_logfile=/var/www/rose/storage/logs/worker.log
   stopwaitsecs=3600
   ```
   Then:
   ```bash
   sudo supervisorctl reread
   sudo supervisorctl update
   sudo supervisorctl start rose-worker:*
   ```

## 📝 License

This project is open-source and available under the [MIT License](LICENSE).

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📧 Contact

Your Name - [@yourtwitter](https://twitter.com/yourtwitter) - email@example.com

Project Link: [https://github.com/yourusername/rose](https://github.com/yourusername/rose)

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
