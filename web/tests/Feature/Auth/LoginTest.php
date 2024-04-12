<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_success_login()
    {
        $payload = [
            "email" => "admin@gmail.com",
            "password" => "123"
        ];

        $response = $this->json('POST', 'api/login', $payload, ['Accept' => 'application/json']);
        $response->assertStatus(200);
    }

    public function test_error_email_not_found()
    {
        $payload = [
            "email" => "admin0005@gmail.com",
            "password" => "123"
        ];

        $response = $this->json('POST', 'api/login', $payload, ['Accept' => 'application/json']);
        $response->assertJson([
            'error' => 'Unauthorized'
        ]);
    }
}
