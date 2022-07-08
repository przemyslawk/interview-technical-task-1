<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Repository;

use App\Infrastructure\User\Factory\UserFactory;
use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\User\Persistence\User as UserModel;

class UserRepository implements UserRepositoryInterface
{
    private UserFactory $userFactory;

    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    public function findById(int $id): ?User
    {
        $model = UserModel::query()->find($id);

        return $model ? $this->userFactory->create($model) : null;
    }

    public function delete(int $id): void
    {
        UserModel::query()->findOrFail($id)->delete();
    }
}
