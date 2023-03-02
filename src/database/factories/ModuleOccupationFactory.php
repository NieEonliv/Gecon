<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Occupation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModuleOccupation>
 */
class ModuleOccupationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'module_id' => Module::all()->random()->id,
            'occupation_id' => Occupation::all()->random()->id,
        ];
    }
}
