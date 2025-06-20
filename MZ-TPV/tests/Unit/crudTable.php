<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Table;

class crudTable extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_table()
    {
        $data = [
            'number' => 5,
            'status' => 'free'
        ];
        $response = $this->post('/tables', $data);
        $response->assertStatus(302); // O 201
        $this->assertDatabaseHas('tables', [
            'number' => 5
        ]);
    }

    public function test_can_list_tables()
    {
        Table::factory()->count(3)->create();
        $response = $this->get('/tables');
        $response->assertStatus(200);
    }

    public function test_can_show_table()
    {
        $table = Table::factory()->create();
        $response = $this->get('/tables/' . $table->id);
        $response->assertStatus(200);
    }

    public function test_can_update_table()
    {
        $table = Table::factory()->create();
        $response = $this->put('/tables/' . $table->id, [
            'status' => 'occupied'
        ]);
        $response->assertStatus(302); // O 200
        $this->assertDatabaseHas('tables', [
            'id' => $table->id,
            'status' => 'occupied'
        ]);
    }

    public function test_can_delete_table()
    {
        $table = Table::factory()->create();
        $response = $this->delete('/tables/' . $table->id);
        $response->assertStatus(302); // O 204
        $this->assertDatabaseMissing('tables', [
            'id' => $table->id
        ]);
    }
}
