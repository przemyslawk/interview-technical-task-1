<?php

declare(strict_types=1);

namespace App\User\Application\Command;

use App\User\Domain\Entity\User;

/**
 * @see UpdateUserHandler
 */
class UpdateUserCommand
{
    private User $user;
    private string $firstName;
    private string $lastName;
    private string $phoneNumber;

    public function __construct(User $user, string $firstName, string $lastName, string $phoneNumber)
    {
        $this->user = $user;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
