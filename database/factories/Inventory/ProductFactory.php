<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'category_id' => Category::factory(),
            'price' => fake()->numberBetween(1, 20) * 1000,
            'stock' => fake()->numberBetween(5, 20),
        ];
    }
}
