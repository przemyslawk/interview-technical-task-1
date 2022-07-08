<?php

declare(strict_types=1);

namespace App\UserDetail\Domain\Model;

use App\Country\Domain\Model\CountryBlueprintInterface;

interface UserDetailBlueprintInterface
{
    public function getId(): int;
    public function getUserId(): int;
    public function getCitizenshipCountryId(): int;
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getPhoneNumber(): string;
    public function getCountry(): CountryBlueprintInterface;
}
