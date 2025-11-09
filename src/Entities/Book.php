<?php

namespace LibraryManager\Entities;

use DateTime;

class Book extends BaseEntity
{
    private string $title;
    private string $author;
    private int $publishedYear;
    private ?User $borrower;

    public function __construct(
        int $id,
        DateTime $createdAt,
        DateTime $updatedAt,
        string $title,
        string $author,
        int $publishedYear,
        ?User $borrower = null
    ) {
        parent::__construct($id, $createdAt, $updatedAt);
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPublishedYear($publishedYear);
        $this->setBorrower($borrower);
    }

    // Getters

    /**
     * Gets the title.
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Gets the author.
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Gets the year of publication.
     * @return int
     */
    public function getPublishedYear(): int
    {
        return $this->publishedYear;
    }

    /**
     * Gets the borrower.
     * @return ?User
     */
    public function getBorrower(): ?User
    {
        return $this->borrower;
    }

    // Setters

    /**
     * Sets the title
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Sets the author
     * @param string $author
     * @return void
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
       * Sets the published year.
       * @param int $publishedYear
       * @return void
       */
    public function setPublishedYear(int $publishedYear): void
    {
        $this->publishedYear = $publishedYear;
    }
    /**
     * Sets the borrower.
     * @param User $borrower
     * @return void
     */
    public function setBorrower(?User $borrower): void
    {
        $this->borrower = $borrower;
        if ($borrower !== null && !in_array($this, $borrower->getBorrowedBooks(), true)) {
            $borrower->addBook($this);
        }
    }
}
