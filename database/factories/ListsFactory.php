<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'id_board' => function () {
                return Board::inRandomOrder()->first()->id;
            },
            'description' => fake()->paragraph,
            'created_by' => function () {
                return User::first()->id;
            },
        ];
    }
}
