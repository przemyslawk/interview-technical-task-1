<?php

declare(strict_types=1);

namespace App\Infrastructure\User\Factory;

use App\Country\Domain\Entity\Country;
use App\User\Domain\Entity\User;
use App\Infrastructure\User\Persistence\User as UserModel;
use App\UserDetail\Domain\Entity\UserDetail;

class UserFactory
{
    public function create(UserModel $userModel): User
    {
        $userDetails = $userModel->getDetails();

        if ($userDetails !== null) {
            $country = $userDetails->getCountry();
            $countryEntity = new Country(
                $country->getId(),
                $country->getName(),
                $country->getIso2(),
                $country->getIso3()
            );

            $userDetailsEntity = new UserDetail(
                $userDetails->getId(),
                $userDetails->getUserId(),
                $userDetails->getCitizenshipCountryId(),
                $userDetails->getFirstName(),
                $userDetails->getLastName(),
                $userDetails->getPhoneNumber(),
                $countryEntity
            );
        }
        return new User(
            $userModel->getId(),
            $userModel->getEmail(),
            $userModel->isActive(),
            $userDetailsEntity ?? null,
        );
    }
}
