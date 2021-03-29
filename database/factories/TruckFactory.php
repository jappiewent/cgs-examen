<?php

namespace Database\Factories;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TruckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Truck::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'license_plate' => $this->createLicensePlate(),
            'country' => $this->faker->country,
            'brand' => $this->faker->randomElement(['DAF', 'VOLVO', 'DACIA']),
        ];
    }

    public function createLicensePlate()
    {
        return strtoupper(Str::random(2).'-'.rand(100,999).'-'.Str::random(1));
    }
}
