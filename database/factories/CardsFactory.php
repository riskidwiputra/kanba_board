<?php

namespace Database\Factories;

use App\Models\CardPriorities;
use App\Models\labels;
use App\Models\Lists;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CardsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_list' => function () {
                return Lists::first()->id;
            },
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'id_label' => labels::factory(),
            'due_date' => fake()->dateTimeBetween('-30 days', '+30 days'),
            'id_assign' => function () {
                return User::first()->id;
            },
            'created_by' => function () {
                return User::first()->id;
            },
        ];
    }
}
