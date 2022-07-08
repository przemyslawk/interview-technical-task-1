<?php

declare(strict_types=1);

namespace App\User\UI\Http\Resource;

use App\User\Application\Query\View\UserView;
use App\UserDetail\Domain\Entity\UserDetail;
use Illuminate\Http\Resources\Json\JsonResource as Resource;

class UserResource extends Resource
{
    /** @var UserView */
    public $resource;

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->resource->getId(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'email' => $this->resource->getEmail(),
            'isActive' => $this->resource->isActive(),
            'country' => $this->getCountryName(),
            'phoneNumber' => $this->getPhoneNumber(),
        ];
    }

    private function getCountryName(): string
    {
        $userDetails = $this->getUserDetails();

        return $userDetails ? $userDetails->getCountry()->getName() : '';
    }

    private function getFirstName(): string
    {
        $userDetail = $this->getUserDetails();

        return $userDetail ? $userDetail->getFirstName() : '';
    }

    private function getLastName(): string
    {
        $userDetail = $this->getUserDetails();

        return $userDetail ? $userDetail->getLastName() : '';
    }

    private function getPhoneNumber(): string
    {
        $userDetail = $this->getUserDetails();

        return $userDetail ? $userDetail->getPhoneNumber() : '';
    }

    private function getUserDetails(): ?UserDetail
    {
        return $this->resource->getUserDetail();
    }
}
