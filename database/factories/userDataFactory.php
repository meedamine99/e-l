<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class userDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {$factory->define(User::class, function (Faker $faker) {
        return [
            'role' => 'user',
            'nom' => $faker->nom,
            'prenom' => $faker->prenom,
            'CIN' => $faker->CIN,
            'ville' => $faker->ville,
            'telephone' => $faker->telephone,
            'adresse' => $faker->adresse,
            'email' => $faker->email,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    });
}

