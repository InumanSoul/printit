<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expenses>
 */
class ExpensesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'amount' => $this->faker->numberBetween(100, 500),
            'document_path' => $this->faker->word,
            'expense_date' => $this->faker->date(),
            'contact_id' => $this->faker->numberBetween(1, 10),
            'company_id' => $this->faker->numberBetween(1, 2),
            'category_id' => $this->faker->numberBetween(1, 2),
            'user_id' => 1,
        ];
    }
}
