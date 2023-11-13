<?php

namespace Database\Factories;

// use App\Models\Forms;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormsFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mail' => $this->faker->email,
            'age' => $this->faker->numberBetween(18, 65),
            'tech_id' => $this->faker->numberBetween(1, 5),
            'birthplace' => $this->faker->city,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
