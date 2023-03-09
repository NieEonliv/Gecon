<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\Module;
use App\Models\ModuleOccupation;
use App\Models\Occupation;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->create();
        User::query()->first()->update(['email' => 'test@test.com', 'password' => '$2y$10$736iaNvRFW4SpwgW1/OIXer1Z9bOjKEoXj25BK9sbOqZml5McH6mG']);
        Course::factory(30)->create();
        Module::factory(90)->create();
        Occupation::factory(270)->create();
        ModuleOccupation::factory(270)->create();
        CourseModule::factory(30)->create();
        UserCourse::factory(30)->create();
    }
}
