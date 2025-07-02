<?php

namespace Database\Factories;

use App\Models\PostWithDb;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => PostWithDb::factory(),
            'user_id' => User::factory(),
            'body' => $this->faker->paragraph()
        ];
    }
}
