<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class ProductFactory extends Factory
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
            'name' => $this->faker->name(),
            'main_price' =>rand(1,5),
            'current_price' => rand(1,5),
            'description'=> $this->faker->text(100),
            'category_id'=> Category::factory(),

        ];
    }
}
