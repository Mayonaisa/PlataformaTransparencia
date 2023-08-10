<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Obligacion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obligacion>
 */
class ObligacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Obligacion::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'año' => $this->faker->year,
            'url' => $this->faker->url,
        ];
    }
}
