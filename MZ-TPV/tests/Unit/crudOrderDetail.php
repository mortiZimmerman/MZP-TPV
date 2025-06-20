<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;

class crudOrderDetail extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_order_detail()
    {
        $order = Order::factory()->create();
        $product = Product::factory()->create();
        $data = [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => 5.0
        ];
        $response = $this->post('/orderdetails', $data);
        $response->assertStatus(302); // O 201
        $this->assertDatabaseHas('order_details', [
            'order_id' => $order->id,
            'product_id' => $product->id
        ]);
    }

    public function test_can_list_order_details()
    {
        OrderDetail::factory()->count(3)->create();
        $response = $this->get('/orderdetails');
        $response->assertStatus(200);
    }

    public function test_can_show_order_detail()
    {
        $detail = OrderDetail::factory()->create();
        $response = $this->get('/orderdetails/' . $detail->id);
        $response->assertStatus(200);
    }

    public function test_can_update_order_detail()
    {
        $detail = OrderDetail::factory()->create();
        $response = $this->put('/orderdetails/' . $detail->id, [
            'quantity' => 5
        ]);
        $response->assertStatus(302); // O 200
        $this->assertDatabaseHas('order_details', [
            'id' => $detail->id,
            'quantity' => 5
        ]);
    }

    public function test_can_delete_order_detail()
    {
        $detail = OrderDetail::factory()->create();
        $response = $this->delete('/orderdetails/' . $detail->id);
        $response->assertStatus(302); // O 204
        $this->assertDatabaseMissing('order_details', [
            'id' => $detail->id
        ]);
    }
}
