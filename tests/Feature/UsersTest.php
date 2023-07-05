<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_authenticated_user_can_access_users_page(): void
    {
        $user = $this->actingAs($this->user);

        $response = $user->get('/users');

        $response->assertStatus(200);
        $response->assertSee($this->user->name);
        $response->assertSee(__('Total Users: ' . 1));
    }

    public function test_unauthenticated_user_cannot_access_users_page(): void
    {
        $response = $this->get('/users');

        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    private function createUser(string $role = 'user'): User
    {
        return User::factory()->create(['role' => $role]);
    }
}
