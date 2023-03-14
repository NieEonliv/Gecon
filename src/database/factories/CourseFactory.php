<?php

namespace Database\Factories;

use App\Service\ConstantService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'author_id' => random_int(1, 2),
            'price' => random_int(100, 100000),
            'image' => ConstantService::IMAGES_COURSE[random_int(0,14)],
            'description' => $this->faker->text,
        ];
    }
}
