<?php

declare(strict_types=1);

namespace App\User\Application\Handler;

use App\User\Application\Command\UpdateUserCommand;
use App\UserDetail\Domain\Repository\UserDetailRepositoryInterface;

class UpdateUserHandler
{
    private UserDetailRepositoryInterface $userDetailRepository;

    public function __construct(
        UserDetailRepositoryInterface $userDetailRepository
    ) {
        $this->userDetailRepository = $userDetailRepository;
    }

    public function handle(UpdateUserCommand $command): void
    {
        $user = $command->getUser();
        $userDetailsEntity = $user->getUserDetail();
        $userDetailsEntity->setFirstName($command->getFirstName());
        $userDetailsEntity->setLastName($command->getLastName());
        $userDetailsEntity->setPhoneNumber($command->getPhoneNumber());

        $this->userDetailRepository->update($userDetailsEntity);
    }
}
