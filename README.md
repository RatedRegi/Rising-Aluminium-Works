# Rising-Aluminium-Works
Rising Aluminium Works is an e-commerce platform that allows customers to browse, request quotations, and place orders for aluminium products. The system supports registered users and guest users, featuring a dynamic shopping cart and an admin panel for managing products, orders, and users.

Features

User authentication (Admin & Customer roles)

Product browsing and filtering

Quotation request system

Shopping cart functionality

Order management


Installation

Follow these steps to set up the project on your local machine:

# Clone the repository
git clone https://github.com/RatedRegi/rising-aluminium-works.git
cd rising-aluminium-works

# Install dependencies
composer install
npm install

# Copy and configure environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Set up the database
php artisan migrate --seed

# Start the development server
php artisan serve

Requirements

PHP 8.x

Laravel 11

MySQL


Usage

Customers can browse products and request a quotation.

Admins can manage products, users, orders, and quotations via the admin panel.


License

This project is licensed under the MIT License.

Contact

For any inquiries or support, reach out via reginaldchikun2@gmail.com.

