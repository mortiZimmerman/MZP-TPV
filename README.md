# MZ-TPV - Laravel POS System

This is a Laravel-based Point of Sale (POS) system for bars and restaurants. It supports user roles (admin, waiter), order management, and more.

## ✅ Requirements

Before starting, make sure you have the following installed:

- [PHP 8.1 or higher](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MySQL or MariaDB](https://www.mysql.com/)
- [Node.js and NPM](https://nodejs.org/) (optional, for frontend assets)
- [Git](https://git-scm.com/)

## 🚀 Installation - Step by Step

1. **Clone the project:**

   ```bash
      https://github.com/mortiZimmerman/MZP-TPV.git
      cd MZ-TPV

2. **Install PHP dependencies:**

   ```bash
      composer install

3. **Create the environment configuration file:**

   ```bash
      cp .env.example .env

4. **Generate application key:**

   Open the .env file in a text editor and update the following lines with your database information:

   ```bash
      php artisan key:generate

4. **Set up the .env file:**

   ```bash
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=tpv
      DB_USERNAME=your_username
      DB_PASSWORD=your_password

6. **Create the database:**

  Go to your MySQL client (like phpMyAdmin or CLI) and create a new database with the name you used in .env.

7. **Run the migrations:**

   ```bash
     php artisan migrate

8. **Start the development server:**
Run the Laravel Tinker console:

    ```bash
      php artisan tinker
    
Then enter this code to create an admin user:

      \App\Models\User::create([
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('admin@1234'),
          'role' => 'admin',
      ]);

9. **Start the development server:**

      ```bash
      php artisan serve

10. **(Optional) Install frontend dependencies (if any):**

   ```bash
      npm install && npm run dev

