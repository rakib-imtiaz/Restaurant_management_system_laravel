# Italian Restaurant Website

A modern restaurant website built with Laravel and Tailwind CSS.

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Git

## Commands and Their Purposes

1. **Clone the repository**
   ```bash
   git clone <repository-url>    # Downloads the project from the repository
   cd <project-folder>          # Navigates into the project directory
   ```

2. **Install PHP dependencies**
   ```bash
   composer install             # Installs all PHP packages defined in composer.json
   ```

3. **Install NPM dependencies**
   ```bash
   npm install                  # Installs all JavaScript packages defined in package.json
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env        # Creates a copy of example environment file
   php artisan key:generate    # Generates application encryption key
   ```

5. **Configure Database**
   - Create a new MySQL database
   - Update .env file with your database credentials:
     ```
     DB_DATABASE=your_database_name    # Specifies the database name
     DB_USERNAME=your_username         # Specifies database user
     DB_PASSWORD=your_password         # Specifies database password
     ```

6. **Run Migrations**
   ```bash
   php artisan migrate         # Creates database tables based on migration files
   ```

7. **Build Assets**
   ```bash
   npm run dev                 # Compiles and bundles frontend assets (CSS, JS)
   ```

8. **Start the Development Server**
   ```bash
   php artisan serve           # Starts Laravel development server
   ```

The application will be available at `http://localhost:8000`

## Additional Configuration

- Configure your web server (Apache/Nginx) if deploying to production
- Set up mail configuration in .env for reservation notifications
- Update other environment variables as needed

## Database Migration Generation

# Generate migrations from existing database
php artisan migrate:generate

# Run all migrations
php artisan migrate

# Rollback all migrations and run again
php artisan migrate:fresh

# Rollback last migration
php artisan migrate:rollback

# Show migration status
php artisan migrate:status

# Clear application cache
php artisan cache:clear

# Clear route cache
php artisan route:clear

# Clear config cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Clear all caches at once
php artisan optimize:clear

# Start Laravel development server
php artisan serve

# Start Vite development server (in separate terminal)
npm run dev

# Build assets for production
npm run build
