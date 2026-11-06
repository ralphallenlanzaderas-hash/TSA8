<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Database\Seeders\CustomerSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PosApplicationTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_and_about_pages_are_public(): void
    {
        $this->get(route('home'))->assertOk()->assertSee('Welcome to your POS application');
        $this->get(route('about'))->assertOk()->assertSee('A simple Laravel POS application');
    }

    public function test_account_resources_require_authentication(): void
    {
        $this->get(route('customers.index'))->assertRedirect(route('login'));
        $this->get(route('users.index'))->assertRedirect(route('login'));
    }

    public function test_seeded_customer_sample_data_contains_five_records(): void
    {
        $this->seed(CustomerSeeder::class);

        $this->assertSame(5, Customer::count());
    }

    public function test_authenticated_user_can_manage_customer_and_user_accounts(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('customers.index'))->assertOk();
        $this->get(route('customers.create'))->assertOk();
        $this->get(route('users.index'))->assertOk();
        $this->get(route('users.create'))->assertOk();

        $this->post(route('customers.store'), [
            'name' => 'Sample Customer',
            'email' => 'customer@example.com',
            'phone' => '09171234567',
        ])->assertRedirect(route('customers.index'));

        $customer = Customer::where('email', 'customer@example.com')->firstOrFail();
        $this->get(route('customers.show', $customer))->assertOk();
        $this->get(route('customers.edit', $customer))->assertOk();
        $this->put(route('customers.update', $customer), [
            'name' => 'Updated Customer',
            'email' => 'customer@example.com',
            'phone' => '09179876543',
        ])->assertRedirect(route('customers.index'));
        $this->assertDatabaseHas('customers', ['id' => $customer->id, 'name' => 'Updated Customer']);

        $this->post(route('users.store'), [
            'name' => 'Managed User',
            'email' => 'managed@example.com',
            'password' => 'ValidPassword123!',
            'password_confirmation' => 'ValidPassword123!',
        ])->assertRedirect(route('users.index'));

        $managedUser = User::where('email', 'managed@example.com')->firstOrFail();
        $this->get(route('users.show', $managedUser))->assertOk();
        $this->get(route('users.edit', $managedUser))->assertOk();
        $this->put(route('users.update', $managedUser), [
            'name' => 'Updated Managed User',
            'email' => 'managed@example.com',
            'password' => '',
            'password_confirmation' => '',
        ])->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['id' => $managedUser->id, 'name' => 'Updated Managed User']);
    }
}
