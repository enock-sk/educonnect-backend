<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    protected $model = Course::class;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create()/;

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::factory(10)->create();

        // Seed 10 Courses
        // Course::factory(10)->create();

        // // Seed 10 Enrollments
        // Enrollment::factory(10)->create();

        // User::factory(10)->create();

        // Seed 10 courses
        
        Course::factory(10)->create();

        // Seed 10 enrollments
        Enrollment::factory(10)->create();
    }
     public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'created_at' => now(),
            'updated_at' => now(),

            // Add other required fields if your DB schema has them
        ];
    }
}
