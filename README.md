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
  [[ git clone https://github.com/your-username/MZ-TPV.git
   cd MZ-TPV](https://github.com/mortiZimmerman/MZP-TPV.git)](https://github.com/mortiZimmerman/MZP-TPV.git)
Install PHP dependencies:

bash
Copiar
Editar
composer install
Create the environment configuration file:

bash
Copiar
Editar
cp .env.example .env
Generate application key:

bash
Copiar
Editar
php artisan key:generate
Set up the .env file:

Open the .env file in a text editor and update the following lines with your database information:

ini
Copiar
Editar
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
Create the database:

Go to your MySQL client (like phpMyAdmin or CLI) and create a new database with the name you used in .env.

Run the migrations:

bash
Copiar
Editar
php artisan migrate
(Optional) Run seeders to add dummy data:

bash
Copiar
Editar
php artisan db:seed
Start the development server:

bash
Copiar
Editar
php artisan serve
Now visit http://127.0.0.1:8000

(Optional) Install frontend dependencies (if any):

bash
Copiar
Editar
npm install && npm run dev
