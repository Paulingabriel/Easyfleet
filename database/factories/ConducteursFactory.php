<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conducteurs>
 */
class ConducteursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ville = $this->faker->city;
        $pays = $this->faker->country;
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'naissance' => $this->faker->dateTimeBetween("1960-01-01", "2001-12-30"),
            'embauche' => $this->faker->dateTimeBetween("1960-01-01", "2001-12-30"),
            "sexe" => array_rand(["F", "M"], 1),
            "lieu" => "$pays, $ville",
            "nationalite" => $pays,
            "pays" => $pays,
            "ville" => $ville,
            "adresse" => $this->faker->address,
            "tel1" => $this->faker->phoneNumber,
            "tel2" => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            "permis" => array_rand(["A", "B", "C", "D", 1]),
            "piece" => array_rand(["CNI", "PASSPORT", "PERMIS DE CONDUIRE", 1]),
            "noPiece" => $this->faker->creditCardNumber,
        ];
    }
}
