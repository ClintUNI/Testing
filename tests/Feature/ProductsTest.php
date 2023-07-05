<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();

        $this->admin = $this->createUser('admin');
    }

    public function test_admin_user_can_access_products(): void
    {
        $admin = $this->actingAs($this->admin);

        $response = $admin->get('/products');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_cannot_access_products(): void
    {
        $user = $this->actingAs($this->user);

        $response = $user->get('/products');

        $response->assertStatus(302);
        $response->assertRedirect('dashboard');
    }

    public function test_unauthenticated_user_cannot_access_products(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    public function test_admin_user_can_view_add_product_btn(): void
    {
        $admin = $this->actingAs($this->admin);

        $response = $admin->get('/products');

        $response->assertStatus(200);
        $response->assertSee(__('New Product'));
    }

    public function test_admin_user_can_access_products_create_page(): void
    {
        $admin = $this->actingAs($this->admin);

        $response = $admin->get('/products/create');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_cannot_access_add_product_page(): void
    {
        $user = $this->actingAs($this->user);

        $response = $user->get('/products/create');

        $response->assertStatus(302);
        $response->assertRedirect('dashboard');
    }

    public function test_unauthenticated_user_cannot_access_add_product_page(): void
    {
        $response = $this->get('/products/create');

        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    private function createUser(string $role = 'user'): User
    {
        return User::factory()->create(['role' => $role]);
    }
}
