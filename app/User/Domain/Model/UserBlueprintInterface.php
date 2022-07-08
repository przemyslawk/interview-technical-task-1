<?php

declare(strict_types=1);

namespace App\User\Domain\Model;

use App\UserDetail\Domain\Model\UserDetailBlueprintInterface;

interface UserBlueprintInterface
{
    public function getId(): int;
    public function getEmail(): string;
    public function isActive(): bool;
    public function getDetails(): ?UserDetailBlueprintInterface;
}
