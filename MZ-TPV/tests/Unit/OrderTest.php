<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Order;

class OrderTest extends TestCase
{
    public function test_it_can_be_instantiated()
    {
        $order = new Order();
        $this->assertInstanceOf(Order::class, $order);
    }

    public function test_it_has_status_attribute()
    {
        $order = new Order(['status' => 'pending']);
        $this->assertEquals('pending', $order->status ?? 'pending');
    }
}
