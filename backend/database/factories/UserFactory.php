<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
<<<<<<< HEAD
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
=======
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'nom' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'mot_de_passe' => Hash::make('password123'),
            'role' => 'user',
            'date_inscription' => now(),
=======
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
<<<<<<< HEAD
=======
     *
     * @return $this
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
