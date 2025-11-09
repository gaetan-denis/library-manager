<?php

namespace LibraryManager\Tests\Entities;

use DateTime;
use LibraryManager\Entities\Book;
use LibraryManager\Entities\User;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public int $id;
    public DateTime $createdAt;
    public DateTime $updatedAt;

    public function setUp(): void
    {
        $this->id = random_int(0, 100);
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    /**
     * Creates a book.
     * @return Book
     */
    public function createBook(): Book
    {
        return new Book($this->id, $this->createdAt, $this->updatedAt, "1984", "George Orwell", 1949);
    }

    public function createUser(): User
    {
        return new User($this->id, $this->createdAt, $this->updatedAt, "John Doe", "jdoe@email.com");
    }
    /**
     * Tests the creation of a Book.
     * @return void
     */
    public function testCanCreateBook(): void
    {
        $book = $this->createBook();
        $this->assertEquals("1984", $book->getTitle());
        $this->assertEquals("George Orwell", $book->getAuthor());
        $this->assertEquals(1949, $book->getPublishedYear());
    }

    /**
     * Tests the setters of Book entity.
     * @return void
     */

    public function testSetters(): void
    {
        $book = $this->createBook();

        $book->setTitle("Animal Farm");
        $this->assertEquals("Animal Farm", $book->getTitle());

        $book->setAuthor("George Orwell");
        $this->assertEquals("George Orwell", $book->getAuthor());

        $book->setPublishedYear(1945);
        $this->assertEquals(1945, $book->getPublishedYear());
    }

    /**
     * Tests that a borrower can be set.
     * @return void
     */

    public function testSetBorrower(): void
    {
        $book = $this->createBook();
        $user = $this->createUser();
        $book->setBorrower($user);
        $this->assertSame($user, $book->getBorrower());
        $this->assertContains($book, $user->getBorrowedBooks());
    }

    /**
     * Tests that a borrower can be null.
     * @return void
     */
    public function testBorrowerIsNull(): void
    {
        $book = $this->createBook();
        $user = null;
        $book->setBorrower($user);
        $this->assertNull($book->getBorrower());
    }

    /**
     * Tests that a borrower cannot add the same book twice.
     * @return void
     */

    public function testBorrowerAddOnlyOneSameBook(): void
    {
        $book = $this->createBook();
        $user = $this->createUser();

        $book->setBorrower($user);
        $book->setBorrower($user);

        $this->assertCount(1, $user->getBorrowedBooks());
    }
}
