<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->randomNumber(6),
            'barcode' => $this->faker->unique()->randomNumber(8),
            'cost' => $this->faker->randomNumber(6),
            'stock' => $this->faker->numberBetween(1, 100),
            'is_composite' => $this->faker->boolean,
            'inventory' => $this->faker->numberBetween(1, 100),
            'inventory_enabled' => $this->faker->boolean,
            'category_id' => $this->faker->numberBetween(1, 2),
            'company_id' => $this->faker->numberBetween(1, 2),
            'user_id' => $this->faker->numberBetween(1, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
