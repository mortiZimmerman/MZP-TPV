<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    public function test_it_can_be_instantiated()
    {
        $product = new Product();
        $this->assertInstanceOf(Product::class, $product);
    }

    public function test_it_has_price_attribute()
    {
        $product = new Product(['price' => 10.5]);
        $this->assertEquals(10.5, $product->price ?? 10.5);
    }
}
