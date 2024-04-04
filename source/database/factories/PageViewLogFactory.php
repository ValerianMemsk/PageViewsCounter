<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageViewLog>
 */
class PageViewLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersIds = \App\Models\User::query()->get('id')->pluck('id')->toArray();
        $usersIds[] = null;

        return [
            'url' => fake()->url(),
            'user_id' => Arr::random($usersIds),
            'created_at' => fake()->dateTimeBetween('-6 month')
        ];
    }
}
