<?php

namespace LibraryManager\Tests\Entities;

use DateTime;
use PHPUnit\Framework\TestCase;
use LibraryManager\Entities\User;
use LibraryManager\Entities\Book;
use LibraryManager\Entities\Library;

class LibraryTest extends TestCase
{
    private int $id;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    protected function setUp(): void
    {
        $this->id = random_int(1, 100);
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    private function createUser(): User
    {
        return new User(
            $this->id,
            $this->createdAt,
            $this->updatedAt,
            "John Doe",
            "jdoe@email.com"
        );
    }

    private function createBook(): Book
    {
        return new Book(
            $this->id,
            $this->createdAt,
            $this->updatedAt,
            "1984",
            "George Orwell",
            1949
        );
    }

    private function createLibrary(): Library
    {
        return new Library(
            $this->id,
            $this->createdAt,
            $this->updatedAt,
            "Library n°1",
            ["1984", "Animal Farm", "Moby Dick"],
            ["John Doe", "Jane Doe", "John Smith"]
        );
    }

    public function testCanCreateLibrary(): void
    {
        $library = $this->createLibrary();

        $this->assertSame("Library n°1", $library->getName());
        $this->assertSame(["1984", "Animal Farm", "Moby Dick"], $library->getBooks());
        $this->assertSame(["John Doe", "Jane Doe", "John Smith"], $library->getUsers());
    }

    public function testSetters(): void
    {
        $library = $this->createLibrary();

        $library->setName("Central Library");
        $this->assertSame("Central Library", $library->getName());

        $newBooks = ["Brave New World", "Fahrenheit 451"];
        $library->setBooks($newBooks);
        $this->assertSame($newBooks, $library->getBooks());

        $newUsers = ["Alice", "Bob"];
        $library->setUsers($newUsers);
        $this->assertSame($newUsers, $library->getUsers());
    }

    public function testAddBookAndUser(): void
    {
        $library = $this->createLibrary();

        // Simulation d’ajout d’un livre et d’un utilisateur
        $library->addBook("Dune");
        $library->addUser("Paul Atreides");

        $this->assertContains("Dune", $library->getBooks());
        $this->assertContains("Paul Atreides", $library->getUsers());
    }
}
