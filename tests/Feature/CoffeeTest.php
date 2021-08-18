<?php

namespace Tests\Feature;

use App\Models\Coffee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class CoffeeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_coffee_list()
    {
        $this->withExceptionHandling();

        Coffee::factory()->count(5)->create();

        $this->json('get', 'api/coffee')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['data' => [
                '*' => [
                    'id',
                    'type',
                    'price',
                    'picture',
                    'amount',
                    'brew_time',
                ]
            ]]);
    }

    /** @test */
    public function user_can_add_coffee()
    {
        $this->withoutExceptionHandling();
        $coffee = Coffee::factory()->raw();
        $this->post('/api/coffee', $coffee)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('coffees', $coffee);
    }

    /** @test  todo split validation rules for each field */
    public function post_coffee_validation()
    {
        $coffee = Coffee::factory()->raw([
            'type' => '',
            'price' => '',
            'picture' => '',
            'amount' => '',
            'brew_time' => ''
            ]);

        $this->post('/api/coffee', $coffee)
            ->assertSessionHasErrors([
                'type',
                'price',
                'picture',
                'amount',
                'brew_time'
            ]);
    }

    /** @test */
    public function user_can_delete_coffee()
    {
        $coffee = Coffee::factory()->create()->toArray();
        $this->delete('/api/coffee/' . $coffee['id']);
        $this->assertDatabaseMissing('coffees', $coffee);
    }

    /** @test */
    public function user_can_update_coffee()
    {
        $coffee = Coffee::factory()->create();
        $updatedCoffee = Coffee::factory()->raw();
        $this->patch('/api/coffee/' . $coffee->id, $updatedCoffee)
            ->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('coffees', $updatedCoffee);
    }
}
