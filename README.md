# Italian Restaurant Website

A modern restaurant website built with Laravel and Tailwind CSS.

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Git

## Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd <project-folder>
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install NPM dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure Database**
   - Create a new MySQL database
   - Update .env file with your database credentials:
     ```
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

6. **Run Migrations**
   ```bash
   php artisan migrate
   ```

7. **Build Assets**
   ```bash
   npm run dev
   ```

8. **Start the Development Server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`

## Additional Configuration

- Configure your web server (Apache/Nginx) if deploying to production
- Set up mail configuration in .env for reservation notifications
- Update other environment variables as needed



for geneartting migration files:


composer require kitloong/laravel-migrations-generator

generate:
php artisan migrate:generate
