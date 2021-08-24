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

        $index = rand(0,2);

        return [
            "price" => $prices[$index],
            "type" => $types[$index],
            "picture" => $this->faker->image('storage/app/public', 640, 480, null, false),
            "amount" => $amount[$index],
            "brew_time" => $time[$index],
        ];
    }
}
