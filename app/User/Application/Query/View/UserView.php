<?php

declare(strict_types=1);

namespace App\User\Application\Query\View;

use App\UserDetail\Domain\Entity\UserDetail;

class UserView
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getUserDetail(): ?UserDetail
    {
        return $this->userDetail;
    }
}
