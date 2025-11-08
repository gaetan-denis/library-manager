<?php

namespace LibraryManager\Entities;

use DateTime;
use InvalidArgumentException;

class User extends BaseEntity
{
    private string $name;
    private string $email;
    /** @var Book[] */
    private array $borrowedBooks;

    public function __construct(
        int $id,
        DateTime $createdAt,
        DateTime $updatedAt,
        string $name,
        string $email,
        array $borrowedBooks = []
    ) {
        parent::__construct($id, $createdAt, $updatedAt);
        $this->setName($name);
        $this->setEmail($email);
        $this->setBorrowedBooks($borrowedBooks);
    }

    // Getters
    /**
     * Gets the name.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets the email.
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Gets the list of books borrowed
     * @return array
     */
    public function getBorrowedBooks(): array
    {
        return $this->borrowedBooks;
    }

    /**
     * Sets the name.
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Sets the email.
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Sets the list of books borrowed.
     * @param Book[] $borrowedBooks
     * @return void
     */
    public function setBorrowedBooks(array $borrowedBooks): void
    {
        foreach ($borrowedBooks as $borrowedBook) {
            if (!$borrowedBook instanceof Book) {
                throw new InvalidArgumentException("Each value must be an object of type \"book\"");
            }
        }
        $this->borrowedBooks = $borrowedBooks;
    }

    /**
     * Adds a borrowed book.
     * @param $book
     * @return void
     */
    public function addBook(Book $book): void
    {
        $this->borrowedBooks[] = $book;
        if ($book->getBorrower() !== $this) {
            $book->setBorrower($this);
        }
    }
}
