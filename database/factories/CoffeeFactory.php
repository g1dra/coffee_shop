<?php

namespace Database\Factories;

use App\Models\Coffee;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoffeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coffee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $prices = [100, 200, 250];

        $types = ['Espresso', 'Espresso doppio', 'Cappuccino'];

        $time = [35,45,60];

        $amount = [7, 14 , 7];

        // $prices[array_rand($prices)]

        return [
            "price" => $this->faker->randomNumber(),
            "type" => $this->faker->word(),
            "picture" => $this->faker->image('storage/app/public', 640, 480, null, false),
            "amount" => $this->faker->randomNumber(),
            "brew_time" => $this->faker->randomNumber(),
        ];
    }
}
