<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone'=> rand(1,10),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => $this->faker->unique()->safeEmail(),
            'full_name' => $this->faker->name(),
            'phone_verified_at' => now(),
            'is_verify'=> $this->faker->boolean(['true', 'false']),
            'forget_code' => Str::random(4),
            'is_active'=> $this->faker->boolean(['true', 'false']),
            'photo' =>$this->faker->imageUrl(400, 300),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'phone_verified_at' => null,
            ];
        });
    }
}
