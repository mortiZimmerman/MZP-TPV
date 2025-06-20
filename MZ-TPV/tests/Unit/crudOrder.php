<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;
use App\Models\Table;

class crudOrder extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_order()
    {
        $user = User::factory()->create();
        $table = Table::factory()->create();
        $data = [
            'user_id' => $user->id,
            'table_id' => $table->id,
            'total' => 50,
            'status' => 'pending'
        ];
        $response = $this->post('/orders', $data);
        $response->assertStatus(302); // O 201
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'table_id' => $table->id
        ]);
    }

    public function test_can_list_orders()
    {
        Order::factory()->count(3)->create();
        $response = $this->get('/orders');
        $response->assertStatus(200);
    }

    public function test_can_show_order()
    {
        $order = Order::factory()->create();
        $response = $this->get('/orders/' . $order->id);
        $response->assertStatus(200);
    }

    public function test_can_update_order()
    {
        $order = Order::factory()->create();
        $response = $this->put('/orders/' . $order->id, [
            'status' => 'paid'
        ]);
        $response->assertStatus(302); // O 200
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'status' => 'paid'
        ]);
    }

    public function test_can_delete_order()
    {
        $order = Order::factory()->create();
        $response = $this->delete('/orders/' . $order->id);
        $response->assertStatus(302); // O 204
        $this->assertDatabaseMissing('orders', [
            'id' => $order->id
        ]);
    }
}
