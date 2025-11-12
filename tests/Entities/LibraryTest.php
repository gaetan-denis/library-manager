<?php

namespace LibraryManager\Tests\Entities;

use LibraryManager\Entities\Book;
use LibraryManager\Entities\Library;
use LibraryManager\Entities\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class LibraryTest extends TestCase
{
    private int $id;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    protected function setUp(): void
    {
        $this->id = random_int(0, 100);
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    private function createUser(string $name = "John Doe", string $email = "jdoe@email.com"): User
    {
        return new User($this->id, $this->createdAt, $this->updatedAt, $name, $email);
    }

    private function createBook(string $title = "1984"): Book
    {
        return new Book($this->id, $this->createdAt, $this->updatedAt, $title, "George Orwell", 1949);
    }

    private function createLibrary(): Library
    {
        $books = [
            $this->createBook("1984"),
            $this->createBook("Animal Farm"),
            $this->createBook("Moby Dick")
        ];
        $users = [
            $this->createUser("John Doe", "john@email.com"),
            $this->createUser("Jane Doe", "jane@email.com"),
            $this->createUser("John Smith", "smith@email.com")
        ];

        return new Library($this->id, $this->createdAt, $this->updatedAt, "Library n°1", $books, $users);
    }

    public function testCanCreateLibrary(): void
    {
        $library = $this->createLibrary();

        $this->assertEquals("Library n°1", $library->getName());
        $this->assertCount(3, $library->getBooks());
        $this->assertCount(3, $library->getUsers());
    }

    public function testAddBookAndUser(): void
    {
        $library = $this->createLibrary();
        $newBook = $this->createBook("Brave New World");
        $newUser = $this->createUser("Alice", "alice@email.com");

        $library->addBook($newBook);
        $library->addUser($newUser);

        $this->assertContains($newBook, $library->getBooks());
        $this->assertContains($newUser, $library->getUsers());
    }

    public function testSetBooksAndUsers(): void
    {
        $library = $this->createLibrary();

        $newBooks = [
            $this->createBook("The Hobbit"),
            $this->createBook("The Lord of the Rings")
        ];
        $newUsers = [
            $this->createUser("Bilbo", "bilbo@email.com"),
            $this->createUser("Frodo", "frodo@email.com")
        ];

        $library->setBooks($newBooks);
        $library->setUsers($newUsers);

        $this->assertCount(2, $library->getBooks());
        $this->assertCount(2, $library->getUsers());
    }
}
