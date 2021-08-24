<?php

namespace Tests\Feature;

use App\Models\Barista;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ManageBaristaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_add_barista()
    {
        $this->withoutExceptionHandling();
        $barista = Barista::factory()->raw();
        $this->post('/api/barista', $barista)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('baristas', $barista);
    }

    /** @test */
    public function get_available_barista()
    {
        // given that we have more baristas, and more of them are available we will get indexed one
        $baristas = Barista::factory(3)->create();
        $index = 2;
        $availableBarista = Barista::availableBarista($index)->first();
        $this->assertTrue($availableBarista->is($baristas[1]));
    }
}
