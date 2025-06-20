<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class crudProduct extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_product()
    {
        $category = Category::factory()->create();
        $data = [
            'name' => 'Producto Test',
            'price' => 10.5,
            'category_id' => $category->id
        ];
        $response = $this->post('/products', $data);
        $response->assertStatus(302); // O 201
        $this->assertDatabaseHas('products', [
            'name' => 'Producto Test'
        ]);
    }

    public function test_can_list_products()
    {
        Product::factory()->count(3)->create();
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_can_show_product()
    {
        $product = Product::factory()->create();
        $response = $this->get('/products/' . $product->id);
        $response->assertStatus(200);
    }

    public function test_can_update_product()
    {
        $product = Product::factory()->create();
        $response = $this->put('/products/' . $product->id, [
            'name' => 'Editado'
        ]);
        $response->assertStatus(302); // O 200
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Editado'
        ]);
    }

    public function test_can_delete_product()
    {
        $product = Product::factory()->create();
        $response = $this->delete('/products/' . $product->id);
        $response->assertStatus(302); // O 204
        $this->assertDatabaseMissing('products', [
            'id' => $product->id
        ]);
    }
}
