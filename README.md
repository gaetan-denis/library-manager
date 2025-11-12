# Library Manager / Gestionnaire de Bibliothèque

![PHPUnit](https://github.com/gaetan-denis/library-manager/actions/workflows/php.yml/badge.svg) ![PHP](https://img.shields.io/badge/PHP-8.3-blue) ![License](https://img.shields.io/badge/License-MIT-green) ![Coverage](https://img.shields.io/badge/Coverage-100%25-brightgreen) ![Last Commit](https://img.shields.io/github/last-commit/gaetan-denis/library-manager)

## English

### Project Purpose

This project is a small object-oriented PHP application designed to manage a library.  
It is primarily intended for **POO (Object-Oriented Programming) practice** and demonstrates the management of relationships between entities such as `Library`, `Book`, and `User` without using an ORM.

### Tech Stack

- PHP 8.3 (OOP)
- PHPUnit 12
- Composer
- Git & Conventional Commits

### Features

- Create libraries, users, and books.
- Add books and users to a library.
- Track which user has borrowed which book.
- Enforce bidirectional relationships between users and books.

### Example Usage

```php
use LibraryManager\Entities\Library;
use LibraryManager\Entities\Book;
use LibraryManager\Entities\User;
use DateTime;

// Create entities
$library = new Library(1, new DateTime(), new DateTime(), "City Library");
$user = new User(1, new DateTime(), new DateTime(), "John Doe", "john@example.com");
$book = new Book(1, new DateTime(), new DateTime(), "1984", "George Orwell", 1949);

// Add entities
$library->addUser($user);
$library->addBook($book);

// Borrow a book
$user->addBook($book);

echo $book->getBorrower()->getName(); // Outputs: John Doe
```

### Testing

This project includes **unit tests** for the entities (`Book`, `User`, etc.) using PHPUnit.

To run the tests:

```bash
composer install
./vendor/bin/phpunit tests
```

### Notes

This project is for training purposes and demonstrates handling collections, entity relationships, and bidirectional links in pure PHP.

---

## Français

### But du projet

Ce projet est une petite application PHP orientée objet conçue pour gérer une bibliothèque.
Il est principalement destiné à l’entraînement à la POO et montre comment gérer les relations entre entités comme `Library`, `Book` et `User` sans utiliser d’ORM.

### Stack Technique

- PHP 8.3 (Programmation Orientée Objet)

- PHPUnit 12 (Tests unitaires)

- Composer (Gestionnaire de dépendances PHP)

- Git & Conventional Commits (Gestion de version et conventions de commits)

### Fonctionnalités

Créer des bibliothèques, des utilisateurs et des livres.

Ajouter des livres et des utilisateurs à une bibliothèque.

Suivre quel utilisateur a emprunté quel livre.

Maintenir les relations bidirectionnelles entre utilisateurs et livres.

### Exemple d’utilisation

```php
use LibraryManager\Entities\Library;
use LibraryManager\Entities\Book;
use LibraryManager\Entities\User;
use DateTime;

// Création des entités
$library = new Library(1, new DateTime(), new DateTime(), "Bibliothèque Municipale");
$user = new User(1, new DateTime(), new DateTime(), "John Doe", "john@example.com");
$book = new Book(1, new DateTime(), new DateTime(), "1984", "George Orwell", 1949);

// Ajout des entités
$library->addUser($user);
$library->addBook($book);

// Emprunt d'un livre
$user->addBook($book);

echo $book->getBorrower()->getName(); // Affiche : John Doe
```

### Tests

Ce projet inclut des **tests unitaires** pour les entités (`Book`, `User`, etc.) avec PHPUnit.

Pour lancer les tests :

```bash
composer install
./vendor/bin/phpunit tests
```

### Remarques

Ce projet sert à s’entraîner et montre la gestion de collections, de relations entre entités et de liens bidirectionnels en PHP pur.
