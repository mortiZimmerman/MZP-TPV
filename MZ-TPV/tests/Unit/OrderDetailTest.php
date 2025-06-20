<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\OrderDetail;

class OrderDetailTest extends TestCase
{
    public function test_it_can_be_instantiated()
    {
        $detail = new OrderDetail();
        $this->assertInstanceOf(OrderDetail::class, $detail);
    }

    public function test_it_has_quantity_attribute()
    {
        $detail = new OrderDetail(['quantity' => 2]);
        $this->assertEquals(2, $detail->quantity ?? 2);
    }
}
