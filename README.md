<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About the project

This Laravel CRUD (Create, Read, Update, Delete) application allows users to manage products with ease. You can perform the following operations on products:

-   **Create:** Add new products to the database with details such as name, price, details, and publish status.

-   **Show:** View a list of all products, as well as detailed information about each product.

-   **Update:** Modify existing product information, such as changing the name, price, details, or publish status.

-   **Delete:** Remove products from the database.

-   **Search:** Filter products by keyword (name or details)

This application is built using Laravel, a powerful PHP framework for web development. It provides a user-friendly interface for managing products and demonstrates best practices for building CRUD functionality in Laravel.

## Setting up the project

**1. Clone the project**

```
git clone https://github.com/marcus6183/laravel_assessment.git
```

**2. Navigate into the project directory and use Composer to install the PHP dependencies**

```
cd laravel_assessment
composer install
```

**3. Copy the environment file**

```
cp .env.example .env
```

**4. Generate application key**

```
php artisan key:generate
```

**5. Install npm dependencies**

```
npm install
```

**6. Start MySQL and Apache Web Server on XAMPP (Other alternatives are also supported)**

**7. Edit `.env` file in project**

Open the .env file in your Laravel project and update the following variables to match your local database configuration:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_assessment
DB_USERNAME=root
DB_PASSWORD=
```

Ensure that:

-   The database specified in **DB_DATABASE** exists in your MySQL server.
-   The credentials (**DB_USERNAME** and **DB_PASSWORD**) are correct for accessing the database.

**8. Run migrations**

```
php artisan migrate
```

**9. Start the development server (Backend)**

```
php artisan serve
```

**10. Start the development server on a seperate terminal (Frontend)**

```
npm run dev
```

**11. Access the application**

-   Open your web browser and navigate to `http://localhost:8000`
