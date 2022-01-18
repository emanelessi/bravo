<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->name(),
            'address' => $this->faker->address(),
            'user_id'=> User::factory(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),

        ];
    }
}
