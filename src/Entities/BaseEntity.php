<?php

namespace LibraryManager\Entities;

use DateTime;

abstract class BaseEntity
{
    private int $id;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        int $id,
        DateTime $createdAt,
        DateTime $updatedAt,
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters

    /**
     * Gets the id.
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Gets the creation date.
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Gets the update date.
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}
