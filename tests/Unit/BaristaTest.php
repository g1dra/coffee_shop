<?php

namespace Tests\Unit;

use App\Models\Barista;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BaristaTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    /** @test */
    public function get_next_in_row_and_available_barista()
    {
        // given that we have more baristas, and more of them are available we will get indexed one
        $baristas = Barista::factory(3)->create();
        $index = 2;
        $availableBarista = Barista::nextAvailableBarista($index, $baristas->count())->first();
        $this->assertTrue($availableBarista->is($baristas[1]));
    }

    /** @test */
    public function round_robin_is_not_available_and_next_available_barista_is_chosen()
    {
        //
    }

    /** @test */
    public function all_baristas_are_busy_so_next_one_in_round_robin_is_chosen()
    {
        //
    }
}
