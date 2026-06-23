# OK-KomisSamochodowy

A simple PHP-based car dealership management application for adding, editing, deleting, searching, and listing vehicles using MySQL.

## Features

- `index.php`: display all cars with purchase price markup
- `add.php`: add a new car to the `samochody` table
- `mod.php`: list cars and navigate to edit forms
- `edit.php`: edit car details
- `del.php`: delete cars from the database
- `search.php`: search cars by brand, model, mileage, color, and production year range
- `menu.php`: shared site navigation
- `style.css`: simple navigation styling
- `footer.php`: shared closing HTML markup and Bootstrap script include

## Requirements

- PHP 7.4+ or compatible PHP version
- MySQL / MariaDB
- Web server (Apache, Nginx, or built-in PHP server)

## Database Setup

The application expects a MySQL database named `komissamochodowy` with at least the following tables:

### `samochody`
- `id_samochodu` INT PRIMARY KEY AUTO_INCREMENT
- `marka` VARCHAR(...)
- `model` VARCHAR(...)
- `przebieg` INT
- `kolor` VARCHAR(...)
- `opis` TEXT
- `rok_produkcji` INT

### `skup`
- `id_samochodu` INT (foreign key to `samochody.id_samochodu`)
- `cena_kupna` DECIMAL(...)

> Note: The app joins `samochody` and `skup` in `index.php` and `mod.php` to display computed pricing.

## Configuration

Update database credentials in the following files if needed:

- `config.php`
- `search.php`
- `del.php`
- `mod.php`
- `edit.php`
- `add.php`

Currently the default config uses:

```php
$server = "localhost";
$user = "user";
$pass = "user";
$db = "komissamochodowy";
```

## Usage

1. Place the project in your web server document root.
2. Create the required database and tables.
3. Navigate to `index.php` in your browser.
4. Use the navigation menu to:
   - add a new car (`add.php`)
   - delete a car (`del.php`)
   - search cars (`search.php`)
   - modify a car (`mod.php` / `edit.php`)

## Notes

- Forms use `GET` in `add.php` and `search.php`, and `POST` in `edit.php` and `del.php`.
- SQL is built directly from request values and does not use prepared statements.
- Input validation and security hardening are not implemented.

## Styling

The application uses Bootstrap 5.3 and a custom `style.css` for navigation spacing and link styling.
