<?php

namespace Database\Factories;

use App\Models\Barista;
use Illuminate\Database\Eloquent\Factories\Factory;

class BaristaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'coffee_grinder' => 300,
        ];
    }
}
