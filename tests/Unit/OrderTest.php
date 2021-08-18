<?php

namespace Tests\Unit;

use App\Models\Coffee;
use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected $order;

    public function setUp() : void
    {
        parent::setUp();

        $this->order = Order::factory()->create();
    }

    /** @test */
    public function order_has_coffee()
    {
        $this->assertInstanceOf(Coffee::class, $this->order->coffee);
    }
}
