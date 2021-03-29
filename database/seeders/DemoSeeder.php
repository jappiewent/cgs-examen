<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // There you go Richard!
        User::query()->create([
            'name' => 'Richard Brons',
            'email' => 'richard.brons@tcs.company',
            'email_verified_at' => now(),
            'password' => Hash::make('Welkom123!'),
        ]);

        Customer::factory()
            ->has(Shipment::factory())
            ->has(Truck::factory())
            ->count(10)
            ->afterMaking(function($customer) {
                $customer->addMediaFromUrl('https://picsum.photos/200')->toMediaCollection('logo');
            })
            ->create();

        Shipment::factory()
            ->has(Truck::factory())
            ->count(10)
            ->create();
    }
}
