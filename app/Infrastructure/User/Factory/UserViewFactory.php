<?php

namespace App\Infrastructure\User\Factory;

use App\Country\Domain\Entity\Country;
use App\User\Application\Query\View\UserView;
use App\User\Application\Query\View\UserViewCollection;
use App\Infrastructure\User\Persistence\User as UserModel;
use App\UserDetail\Domain\Entity\UserDetail;
use Illuminate\Support\Collection;

class UserViewFactory
{
    public function createView(UserModel $model): UserView
    {
        return new UserView(
            $model->getId(),
            $model->getEmail(),
            $model->isActive(),
            $this->getUserDetails($model),
        );
    }

    public function createCollection(Collection $models): UserViewCollection
    {
        $collection = new UserViewCollection();
        /** @var UserModel $model */
        foreach ($models as $model) {
            $collection->add($this->createView($model));
        }
        return $collection;
    }

    private function getUserDetails(UserModel $model): ?UserDetail
    {
        $userDetails = $model->getDetails();
        if ($userDetails === null) {
            return null;
        }

        $country = $userDetails->getCountry();
        $countryEntity = new Country(
            $country->getId(),
            $country->getName(),
            $country->getIso2(),
            $country->getIso3()
        );

        return new UserDetail(
            $userDetails->getId(),
            $userDetails->getUserId(),
            $userDetails->getCitizenshipCountryId(),
            $userDetails->getFirstName(),
            $userDetails->getLastName(),
            $userDetails->getPhoneNumber(),
            $countryEntity
        );
    }
}
