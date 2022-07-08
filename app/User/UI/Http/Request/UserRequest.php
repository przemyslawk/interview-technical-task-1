<?php

declare(strict_types=1);

namespace App\User\UI\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'active' => 'required|numeric',
            'country' => 'required|string',
        ];
    }

    public function getActive(): bool
    {
        return (bool) Arr::get($this->validated(), 'active');
    }

    public function getCountry(): string
    {
        return Arr::get($this->validated(), 'country');
    }

    /**
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST)
        );
    }

}
