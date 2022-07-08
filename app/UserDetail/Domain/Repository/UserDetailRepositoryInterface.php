<?php

declare(strict_types=1);

namespace App\UserDetail\Domain\Repository;

use App\UserDetail\Domain\Entity\UserDetail;

interface UserDetailRepositoryInterface
{
    public function update(UserDetail $user): void;
}
