<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition(): array
    {
        return [
            'image' => 'default.jpg',
            'status' => $this->faker->randomElement(['active', 'disabled']),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Department $department) {
            foreach (config('app.languages') as $locale => $language) {
                $department->translateOrNew($locale)->name = $this->faker->company;
            }
            $department->save();
        });
    }
}
