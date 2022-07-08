<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use Illuminate\Support\Collection;

class UserCollection extends Collection
{
    public function addElement(User $user)
    {
        $this->add($user);
    }
}
