<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' =>$this->faker->imageUrl(400, 300),
            'text' => $this->faker->text(),
            'is_active'=> $this->faker->randomElement(['true', 'false']),

        ];
    }
}
