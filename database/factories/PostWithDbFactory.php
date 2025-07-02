<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostWithDbFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => category::factory(),
            'user_id' => User::factory(),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->unique()->sentence(),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'date' => now(),
        ];
    }
}
