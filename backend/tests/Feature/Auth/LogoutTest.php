<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();

        $token = JWTAuth::fromUser($user);

        $response = $this->withHeader('Authorization', "Bearer {$token}")
            ->postJson('/api/auth/logout');

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Successfully logged out',
            ]);
    }

    /** @test */
    public function logout_fails_without_token(): void
    {
        $response = $this->postJson('/api/auth/logout');

        $response->assertStatus(401);
    }
}