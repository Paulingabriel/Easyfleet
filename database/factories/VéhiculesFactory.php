<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Véhicules>
 */
class VéhiculesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "matricule" => $this->faker->swiftBicNumber(),
            "nom" => $this->faker->firstName(),
            "type" => $this->faker->firstName(),
            "marque" => $this->faker->firstName(),
            "modèle" => $this->faker->firstName(),
            "couleur" => $this->faker->colorName(),
            "prix" => rand(1000000, 10000000),
            "devise" => $this->faker->firstName(),
            "conducteur_id" => rand(1, 4)
        ];
    }
}
