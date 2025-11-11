<?php

namespace LibraryManager\Tests\Entities;

use PHPUnit\Framework\TestCase;
use DateTime;
use LibraryManager\Entities\User;

class UserTest extends TestCase
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

    public function createUser(): User
    {
        return new User($this->id, $this->createdAt, $this->updatedAt, "John Doe", "jdoe@email.com");
    }

    public function testCanCreateUser(): void
    {
        $user = $this->createUser();
        $this->assertEquals("John Doe", $user->getName());
        $this->assertEquals("jdoe@email.com", $user->getEmail());
    }

    public function testSetters(): void
    {
        $user = $this->createUser();
        $user->setName("John Smith");
        $this->assertEquals("John Smith", $user->getName());
        $user->setEmail("jsmith@email.com");
        $this->assertEquals("jsmith@email.com", $user->getEmail());
    }
}
