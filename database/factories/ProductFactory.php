<?php

namespace Database\Factories;

use App\Models\User;
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
            'name' => $this->faker->words(2, true),
        'description' => $this->faker->paragraph(),
        'price' => $this->faker->randomFloat(2, 5, 500),
        'stock' => $this->faker->numberBetween(0, 100),
        'image' => 'box.png',
        'owner_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
