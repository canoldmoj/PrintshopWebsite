# MustardSeed Printing  Web Application

Welcome to the **MustardSeed Printing Web Application**! This platform provides an online storefront for customers to place printing orders and allows admins to manage the business operations efficiently.

---

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Getting Started](#getting-started)
- [Installation](#installation)
- [Usage](#usage)
- [Database Schema](#database-schema)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)

---

## About the Project

The **MustardSeed Printing Web Application** is designed to streamline the workflow for both customers and administrators of a printing shop. Customers can browse products, place orders, and make payments, while admins can monitor and manage incoming orders through a dedicated portal.

---

## Features

### Customer Side

- User registration and login.
- Browse products and services.
- Add items to a shopping cart.
- Checkout with payment options.

### Admin Portal

- View and manage customer orders.
- Update order fulfillment status.
- Add, edit, or remove products.

---

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript (Bootstrap for styling)
- **Backend**: PHP
- **Database**: MySQL
- **Deployment**: [GitHub ](https://github.com/canoldmoj/PrintshopWebsite/tree/master) or a compatible PHP hosting service.

---

## Getting Started

### Prerequisites

Ensure you have the following installed on your local machine:

- PHP >= 7.4
- MySQL
- Composer (optional for dependency management)

### Installation

1. Clone the repository:  
   ```bash
   git clone https://github.com/canoldmoj/PrintshopWebsite/tree/master
   cd printing-shop
   ```

2. Set up the database:
   - Import the `database.sql` file located in the `/db` directory into your MySQL server.
   - Configure your database connection in `/config/db_connect.php`.

3. Start the development server:
   ```bash
   php -S localhost:8000
   ```


---

## Usage

### Customer Access

- Navigate to the home page to browse available printing services.
- Register or log in to place an order.
- Add desired products to the cart and proceed to payment.

### Admin Access

- Log in using admin credentials.
- View and manage customer orders via the admin dashboard.
- Update the product catalog as needed.

---

## Database Schema

### Tables

- `users`: Stores customer and admin details.
- `products`: Stores details about printing services/products.
- `orders`: Tracks customer orders and statuses.
- `order_items`: Links specific products to orders.
- `product_requests`: Tracks order fulfillment (`fulfilled` column).

---

## Deployment

1. Push the project to a GitHub repository:
   ```bash
   git add .
   git commit -m "Initial commit"
   git push origin main
   ```

2. Set up your hosting platform:
   - For GitHub Pages: Use a static site generator or configure a PHP hosting service.
   - Ensure the `/config/db_connect.php` file is updated for the production database.

---

