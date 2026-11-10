<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_admin_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/login')->assertOk();
    }

    public function test_admins_can_access_the_dashboard(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->get('/admin')->assertOk();
    }

    public function test_ordinary_users_cannot_access_the_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin')->assertForbidden();
    }

    public function test_admin_access_can_be_granted_to_an_existing_user(): void
    {
        $user = User::factory()->create();

        $this->artisan('app:grant-admin', ['email' => $user->email])->assertSuccessful();

        $this->assertTrue($user->fresh()->is_admin);
    }

    public function test_granting_access_to_a_missing_user_fails(): void
    {
        $this->artisan('app:grant-admin', ['email' => 'missing@example.com'])->assertFailed();
        $this->assertDatabaseCount('users', 0);
    }
}
