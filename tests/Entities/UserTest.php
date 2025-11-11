<?php

namespace LibraryManager\Tests\Entities;

use PHPUnit\Framework\TestCase;
use DateTime;
use InvalidArgumentException;
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

    /**
     * Tests the creation of a user.
     * @return void
     */
    public function testCanCreateUser(): void
    {
        $user = $this->createUser();
        $this->assertEquals("John Doe", $user->getName());
        $this->assertEquals("jdoe@email.com", $user->getEmail());
    }

    /**
     * Test the setters.
     * @return void
     */
    public function testSetters(): void
    {
        $user = $this->createUser();
        $user->setName("John Smith");
        $this->assertEquals("John Smith", $user->getName());
        $user->setEmail("jsmith@email.com");
        $this->assertEquals("jsmith@email.com", $user->getEmail());
    }

    /**
     * Tests if the name is empty.
     * @return void
     */
    public function testIfNameIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Name cannot be empty.");
        $user = $this->createUser();
        $user->setName("");
    }

    /**
     * Tests if the email is invalid.
     * @return void
     */
    public function testIfEmailIsInvalid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Email must be valid.");
        $user = $this->createUser();
        $user->setEmail("jdoe.email");
    }
}
