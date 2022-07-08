<?php

declare(strict_types=1);

namespace App\User\Application\Service;

use App\User\Application\Exception\UserHasDetailsException;
use App\User\Application\Exception\UserHasNotDetailsException;
use App\User\Application\Exception\UserNotExistException;
use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;

class GetUserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(int $id): User
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            throw UserNotExistException::userNotExist();
        }

        return $user;
    }

    public function getUserWithoutDetails(int $id): ?User
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            throw UserNotExistException::userNotExist();
        }

        if ($user->getUserDetail() !== null) {
            throw UserHasDetailsException::userHasDetails();
        }

        return $user;
    }

    public function getUserWithDetails(int $id): ?User
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            throw UserNotExistException::userNotExist();
        }

        if ($user->getUserDetail() === null) {
            throw UserHasNotDetailsException::userHasNotDetails();
        }

        return $user;
    }
}
