<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_and_receive_token(): void
    {
        $payload = [
            'name' => 'Anirban',
            'email' => 'anirban@example.com',
            'password' => 'Password@123',
            'password_confirmation' => 'Password@123',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in',
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'anirban@example.com',
        ]);
    }
}