<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => array_rand(['teacher' => 'teacher', 'student' => 'student']),
            'class' => array_rand(['Маг' => 'Маг', 'Воин' => 'Воин', 'Следопыт' => 'Следопыт', 'Элементалист' => 'Элементалист']),
            'lastname' => $this->faker->word,
            'firstname' => $this->faker->word,
            'patronymic' => $this->faker->word,
            'birthday' => $this->faker->date,
            'photo' => $this->faker->imageUrl,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
