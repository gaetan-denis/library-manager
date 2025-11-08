<?php

namespace LibraryManager\Tests\Entities;

use DateTime;
use LibraryManager\Entities\Book;
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
}
