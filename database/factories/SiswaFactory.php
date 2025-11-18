<?php

namespace Database\Factories;

use App\Models\Lembaga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numerify('###'),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'lembaga_id' => Lembaga::inRandomOrder()->first()->id,
        ];
    }
}
