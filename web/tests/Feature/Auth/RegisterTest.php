<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function testSuccessRegister()
    {
        $payload = [
            "name" => "admin2",
            "email" => "admin2@gmail.com",
            "password" => "123",
            "password_confirmation" => "123"
        ];

        $response = $this->json('POST', 'api/register', ['Accept' => 'application/json']);
        $response->assertStatus(200);

    }


    public function testErrorRegisterEmailExist()
    {
        $payload = [
            "name" => "admin2",
            "email" => "admin2@gmail.com",
            "password" => "123",
            "password_confirmation" => "123"
        ];

        $response = $this->json('POST', 'api/register', ['Accept' => 'application/json']);
        $response->assertJson([
            'message' => 'The name field is required. (and 2 more errors)'
        ]);
    }
}
