# CRUD Application with HTMX

This is a simple CRUD (Create, Read, Update, Delete) application built with PHP and [HTMX](https://htmx.org/). 

## Overview

- `index.php` - Displays a list of records from the `contacts` table and forms to add/update records. Uses HTMX for AJAX requests.

- `create.php` - Handles creating new records in the `contacts` table.

- `read.php` - Displays details of a single record. 

- `update.php` - Handles updating an existing record.

- `delete.php` - Handles deleting a record.

- `conn.php` - Database connection details.

## Features

- Create, read, update and delete contacts 
- Modals for adding, editing and viewing contacts
- Real-time updates using HTMX
- Tailwind CSS for styling

## Installation

1. Import the `contacts.sql` table into a MySQL database 
2. Update the database credentials in `conn.php`
3. Start PHP server and access `index.php` 

## Dependencies

- PHP 7.4+
- MySQL
- HTMX
- Tailwind CSS

## License

This project is open source and available under the [MIT License](LICENSE).