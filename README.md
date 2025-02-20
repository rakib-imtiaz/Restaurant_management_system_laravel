# Restaurant Management System

A comprehensive restaurant management system built with Laravel, featuring table reservations, menu management, billing, and email notifications.

## System Requirements

- PHP >= 8.1
- MySQL >= 5.7
- Composer
- Node.js & NPM
- Git

## Installation Steps

1. **Clone the Repository**
```bash
git clone https://github.com/yourusername/Restaurant_management_system_laravel.git
cd Restaurant_management_system_laravel
```

2. **Install PHP Dependencies**
```bash
composer install
```

3. **Install JavaScript Dependencies**
```bash
npm install
```

4. **Environment Setup**
```bash
# Copy the example env file
cp .env.example .env

# Generate application key
php artisan key:generate
```

5. **Configure Database**
Edit the `.env` file and update these lines with your database details:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restaurant_management_system
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. **Configure Email**
Update these lines in `.env` for email functionality:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_specific_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

7. **Run Migrations and Seeders**
```bash
# Create database tables and seed initial data
php artisan migrate:fresh --seed
```

8. **Build Assets**
```bash
npm run build
```

9. **Start the Development Server**
```bash
php artisan serve
```

## Default Users

After seeding, you can login with these default accounts:

### Admin Account
- Email: admin@restaurant.com
- Password: admin123

### Test User Account
- Email: user1@gmail.com
- Password: 123456789

## Key Features

1. **User Management**
   - User registration with email verification
   - Admin and customer roles
   - Profile management

2. **Table Management**
   - Add/edit tables
   - Track table status
   - Table capacity management

3. **Reservation System**
   - Online table reservations
   - Reservation status tracking
   - Email notifications

4. **Menu Management**
   - Category management
   - Add/edit menu items
   - Price and availability control

5. **Billing System**
   - Generate bills
   - Payment processing
   - PDF bill generation

## Email Setup Guide

To enable email notifications (required for OTP verification):

1. Go to your Google Account settings
2. Enable 2-Step Verification
3. Generate an App Password:
   - Go to Security settings
   - Select 'App Passwords'
   - Generate a new app password
4. Use this password in your `.env` file

## Common Issues and Solutions

1. **Storage Link Issue**
```bash
php artisan storage:link
```

2. **Cache Issues**
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

3. **Permission Issues**
```bash
chmod -R 777 storage bootstrap/cache
```

## Directory Structure Overview

- `app/` - Contains core application code
- `database/` - Migrations and seeders
- `resources/` - Views, assets, and language files
- `routes/` - Application routes
- `public/` - Publicly accessible files

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## Security

If you discover any security-related issues, please email your-email@example.com instead of using the issue tracker.

## License

This project is licensed under the MIT License - see the LICENSE file for details
