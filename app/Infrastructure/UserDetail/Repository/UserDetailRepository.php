<?php

namespace App\Infrastructure\UserDetail\Repository;

use App\Infrastructure\UserDetail\Persistence\UserDetail as UserDetailModel;
use App\UserDetail\Domain\Entity\UserDetail;
use App\UserDetail\Domain\Repository\UserDetailRepositoryInterface;

class UserDetailRepository implements UserDetailRepositoryInterface
{
    public function update(UserDetail $user): void
    {
        $userModel = UserDetailModel::find($user->getId());

        $userModel->first_name = $user->getFirstName();
        $userModel->last_name = $user->getLastName();
        $userModel->phone_number = $user->getPhoneNumber();
        $userModel->save();
    }
}
