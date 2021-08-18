<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class MakeOrderTest extends TestCase
{
    use RefreshDatabase;

    protected $order;

    public function setUp(): void
    {
        parent::setUp();

        $this->order = Order::factory()->raw();
    }

    /** @test */
    public function order_from_web_ui()
    {
        $this->post('/api/order', $this->order)->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('orders', $this->order);
    }
}
