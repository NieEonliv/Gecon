<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Occupation>
 */
class OccupationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'type' => array_rand(['lecture' => 'lecture', 'practical' => 'practical']),
            'experience' => random_int(10, 15),
            'content' => '<p>'.$this->faker->text.'</p>',
        ];
    }
}
