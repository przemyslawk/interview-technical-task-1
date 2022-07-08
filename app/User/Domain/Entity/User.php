<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\UserDetail\Domain\Entity\UserDetail;

class User
{
    private int $id;
    private string $email;
    private bool $active;
    private ?UserDetail $userDetail;

    public function __construct(int $id, string $email, bool $active, ?UserDetail $userDetail)
    {
        $this->id = $id;
        $this->email = $email;
        $this->active = $active;
        $this->userDetail = $userDetail;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getUserDetail(): ?UserDetail
    {
        return $this->userDetail;
    }

    public function setUserDetail(UserDetail $userDetail): void
    {
        $this->userDetail = $userDetail;
    }
}
