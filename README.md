<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Invoice App

## Overview

This Invoice App is a web application built with Laravel and Vue.js, designed to manage invoices efficiently. It provides features such as listing all invoices, creating new invoices, viewing, editing, and deleting existing invoices. The application utilizes several models including Invoice, InvoiceItem, Product, User, and Counter.

## Features

### 1. Homepage - List of Invoices

The homepage displays a comprehensive list of all invoices. It provides a quick overview of issued invoices.

### 2. Search Filter

The app incorporates a search filter functionality, allowing users to quickly find specific invoices based on various criteria. This enhances efficiency in locating and managing invoices.

### 3. Create New Invoice

Users can easily create a new invoice through a user-friendly interface. The creation process includes specifying customer details, issue date, due date, item details, and other relevant information.

### 4. View Invoice Details

The application allows users to view detailed information about a specific invoice. This includes customer details, itemized product information, total amounts, and terms and conditions.

### 5. Edit Invoice

Users have the capability to edit existing invoices, providing flexibility in updating customer details, item quantities, and other relevant invoice information.

### 6. Delete Invoice

For management purposes, the application supports the deletion of invoices. Users can remove unnecessary or outdated invoices from the system.

### 7. Models

- **Invoice**: Represents an invoice with customer details, issue date, due date, total amounts, and terms and conditions.
- **InvoiceItem**: Represents individual items within an invoice, including product details, quantity, and unit price.
- **Product**: Represents products available for invoicing.
- **User**: Represents users who interact with the system.
- **Counter**: Handles counting mechanisms, for generating unique invoice numbers.

## Installation

To run the Invoice App locally, follow these steps:

1. Clone the repository: `git clone <repository_url>`
2. Install Composer dependencies: `composer install`
3. Install NPM dependencies: `npm install`
4. Create a copy of the `.env` file: `cp .env.example .env`
5. Configure the database connection in the `.env` file.
6. Generate application key: `php artisan key:generate`
7. Run database migrations: `php artisan migrate`
8. Seed the database with initial data: `php artisan db:seed`
9. Compile assets: `npm run dev`
10. Serve the application: `php artisan serve`

Visit the provided URL in your browser to access the Invoice App.

