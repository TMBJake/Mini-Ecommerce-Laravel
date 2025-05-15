<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">Mini E-Commerce Laravel App</h2>
<p align="center">A lightweight Laravel 12 e-commerce system with cart, checkout, and admin product management.</p>

---

## Features

-   User authentication (Laravel UI)
-   Admin-only product management (`is_admin` middleware)
-   Add/update/remove products in session-based cart
-   Quantity-aware checkout with stock validation
-   Prevents over-ordering
-   Stock auto-decreases when an order is placed
-   Image upload support for products
-   Order saving with item breakdown

---

## Setup Instructions

```bash
git clone https://github.com/TMBJake/mini-ecommerce-laravel.git
cd mini-ecommerce-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Admin Access
Manually set is_admin = 1 for your user in the users table to access product management features.
