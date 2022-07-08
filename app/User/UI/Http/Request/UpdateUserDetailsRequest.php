<?php

declare(strict_types=1);

namespace App\User\UI\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateUserDetailsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
        ];
    }

    public function getFirstname(): string
    {
        return Arr::get($this->validated(), 'firstName');
    }

    public function getLastName(): string
    {
        return Arr::get($this->validated(), 'lastName');
    }

    public function getPhoneNumber(): string
    {
        return Arr::get($this->validated(), 'phoneNumber');
    }
}
