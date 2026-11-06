<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['name' => 'Alex Santos', 'email' => 'alex.santos@example.com', 'phone' => '09171234501'],
            ['name' => 'Jamie Reyes', 'email' => 'jamie.reyes@example.com', 'phone' => '09171234502'],
            ['name' => 'Morgan Cruz', 'email' => 'morgan.cruz@example.com', 'phone' => '09171234503'],
            ['name' => 'Taylor Garcia', 'email' => 'taylor.garcia@example.com', 'phone' => '09171234504'],
            ['name' => 'Casey Flores', 'email' => 'casey.flores@example.com', 'phone' => '09171234505'],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrCreate(['email' => $customer['email']], $customer);
        }
    }
}
