<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' =>rand(1,5),
            'product_id'=> Product::factory(),
            'user_id'=> User::factory(),
            'cost' => rand(1,5),
            'states'=> $this->faker->randomElement(['pending','in_progress','rejected','done']),
            'address' => $this->faker->address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
