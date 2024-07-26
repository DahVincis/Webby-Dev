# Supermarket Management System

## Description

The Supermarket Management System is a web-based application designed to manage the various aspects of a supermarket. It includes features for managing inventory, sales, customers, and employees. This project is built using PHP with XAMPP and MariaDB/SQL for the database.

## Features

- Inventory management: Add, update, and delete products.
- Sales management: Record and track sales transactions.
- Customer management: Add, update, and view customer details.
- Employee management: Manage employee records and roles.
- Reporting: Generate reports for sales, inventory, and more.

## Technologies Used

- PHP
- XAMPP
- MariaDB/SQL
- HTML/CSS
- JavaScript

## Installation

### Prerequisites

- XAMPP installed on your machine.
- A web browser (e.g., Chrome, Firefox).

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/DahVincis/Webby-Dev.git
   ```

2. Move the project folder to the XAMPP `htdocs` directory:
   ```bash
   mv supermarket-management-system /path/to/xampp/htdocs/
   ```

3. Start XAMPP and ensure Apache and MySQL are running.

4. Import the database:
   - Open phpMyAdmin (usually accessible at `http://localhost/phpmyadmin`).
   - Create a new database named `supermarket`.
   - Import the `supermarket_db - most recent.sql` file located in the sql folder into the `supermarket` database.

5. Configure the database connection:
   - Open `config.php` in the project folder.
   - Update the database connection settings as needed:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "supermarket";
     ```

6. Open the project in your web browser:
   ```bash
   http://localhost/supermarket-management-system
   ```

## Usage

1. Login to the system using the default admin credentials:
   - Username: `admin`
   - Password: `admin`

2. Navigate through the dashboard to manage inventory, sales, customers, and employees.

3. Use the reporting section to generate various reports.

## License

This project is licensed under the MIT License.
