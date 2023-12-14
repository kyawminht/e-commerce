<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'meta_title' => $this->faker->sentence,
            'meta_keyword' => $this->faker->words(5, true),
            'meta_description' => $this->faker->paragraph,
            'status' => 0,
        ];
    }
}
