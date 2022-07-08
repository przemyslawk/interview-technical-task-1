<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testGetActiveUsersFromAustria(): void
    {
        $queryParams = [
            'active' => 1,
            'country' => 'Austria',
        ];

        $response = $this->json(Request::METHOD_GET, '/users?' . http_build_query($queryParams));

        $response->assertSuccessful();
        $response->assertJson([
            [
                'id' => 1,
                'email' => 'alex@tempmail.com'
            ],
            [
                'id' => 6,
                'email' => 'Taaaaaaa@test.com'
            ],
        ]);
    }

    public function testUpdateUserDetailsIfDetailsExist(): void
    {
        $response = $this->json(
            Request::METHOD_PATCH,
            '/users/1',
            [
                'firstName' => '***',
                'lastName' => '*****',
                'phoneNumber' => '70000000',
            ]
        );

        $response->assertSuccessful();

        $this->assertDatabaseHas('user_details', [
            'user_id' => 1,
            'first_name' => '***',
            'last_name' => '*****',
            'phone_number' => '70000000',
        ]);
    }

    public function testUpdateUserDetailsReturnForbiddenWhenDetailsNotExist(): void
    {
        $response = $this->json(
            Request::METHOD_PATCH,
            '/users/2',
            [
                'firstName' => '***',
                'lastName' => '*****',
                'phoneNumber' => '70000000',
            ]
        );

        $response->assertStatus(Response::HTTP_FORBIDDEN);
        $response->assertJson([
            'errors' => [
                'Action forbidden'
            ]
        ]);
    }

    public function testUpdateUserDetailsReturnNotFoundWhenDetailsNotExist(): void
    {
        $response = $this->json(
            Request::METHOD_PATCH,
            '/users/10',
            [
                'firstName' => '***',
                'lastName' => '*****',
                'phoneNumber' => '70000000',
            ]
        );

        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'errors' => [
                'User not exists.'
            ]
        ]);
    }

    public function testDeleteUserIfDetailsNotExist(): void
    {
        $response = $this->json(
            Request::METHOD_DELETE,
            '/users/2'
        );

        $response->assertSuccessful();
        $this->assertDatabaseMissing('users', [ 'id' => 2]);
    }

    public function testDeleteUserReturnNotFoundWhenUserNotExist(): void
    {
        $response = $this->json(
            Request::METHOD_DELETE,
            '/users/10'
        );

        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'errors' => [
                'User not exists.'
            ]
        ]);
    }

    public function testDeleteUserWhenDetailsExist(): void
    {
        $response = $this->json(
            Request::METHOD_DELETE,
            '/users/1'
        );

        $response->assertStatus(Response::HTTP_FORBIDDEN);
        $response->assertJson([
            'errors' => [
                'Action forbidden.'
            ]
        ]);

        $this->assertDatabaseHas('users', [ 'id' => 1]);
    }
}
