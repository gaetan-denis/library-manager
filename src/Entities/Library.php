<?php

namespace LibraryManager\Entities;

use DateTime;
use InvalidArgumentException;

class Library extends BaseEntity
{
    private string $name;
    /** @var Book[] */
    private array $books;
    /** @var User[] */
    private array $users;

    public function __construct(
        int $id,
        DateTime $createdAt,
        DateTime $updatedAt,
        string $name,
        array $books = [],
        array $users = [],
    ) {
        parent::__construct($id, $createdAt, $updatedAt);
        $this->name = $name;
        $this->books = $books;
        $this->users = $users;
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
     * Gets the list of books.
     * @return array
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * Gets the list of users.
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    // setters

    /**
     * Sets the name.
     * @param string $name
     * @return void
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /** Sets the list of books.
     * @param Book[] $books
     * @return void
     * @throws InvalidArgumentException
     */
    public function setBooks(array $books): void
    {
        foreach ($books as $book) {
            if (!$book instanceof Book) {
                throw new InvalidArgumentException("Each value must be of type \"Book\"");
            }
        }
        $this->books = $books;
    }

    /**
     * Sets the Lis o users.
     * @param User[] $users
     * @return void
     * @throws InvalidArgumentException
     */
    public function setUsers(array $users): void
    {
        foreach ($users as $user) {
            if (!$user instanceof User) {
                throw new InvalidArgumentException("Each value must be of type \"User\"");
            }
        }
        $this->users = $users;
    }

    /**
     * Add a book to the list of books
     * @param Book $book
     * @return void
     */
    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    /**
     * Add a book to the list of users
     * @param User $user
     * @return void
     */
    public function addUser(User $user): void
    {
        $this->users[] = $user;
    }
}
