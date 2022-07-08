<?php

declare(strict_types=1);

namespace App\UserDetail\Domain\Entity;

use App\Country\Domain\Entity\Country;

class UserDetail
{
    private int $id;
    private int $userId;
    private int $countryId;
    private string $firstName;
    private string $lastName;
    private string $phoneNumber;
    private Country $country;

    public function __construct(
        int $id,
        int $userId,
        int $countryId,
        string $firstName,
        string $lastName,
        string $phoneNumber,
        Country $country
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->countryId = $countryId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->country = $country;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }
}
