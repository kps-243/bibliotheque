<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(3),
            'prix' => $this->faker->randomFloat(2, 5, 50),
            'date_publication' => $this->faker->date(),
            'auteur_id' => \App\Models\Auteur::inRandomOrder()->first()?->id ?? \App\Models\Auteur::factory(),
        ];
    }
}
