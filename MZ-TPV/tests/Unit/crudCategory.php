<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;

class crudCategory extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_category()
    {
        $data = [
            'name' => 'Categoría Test'
        ];
        $response = $this->post('/categories', $data);
        $response->assertStatus(302); // O 201
        $this->assertDatabaseHas('categories', [
            'name' => 'Categoría Test'
        ]);
    }

    public function test_can_list_categories()
    {
        Category::factory()->count(3)->create();
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }

    public function test_can_show_category()
    {
        $category = Category::factory()->create();
        $response = $this->get('/categories/' . $category->id);
        $response->assertStatus(200);
    }

    public function test_can_update_category()
    {
        $category = Category::factory()->create();
        $response = $this->put('/categories/' . $category->id, [
            'name' => 'Editado'
        ]);
        $response->assertStatus(302); // O 200
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Editado'
        ]);
    }

    public function test_can_delete_category()
    {
        $category = Category::factory()->create();
        $response = $this->delete('/categories/' . $category->id);
        $response->assertStatus(302); // O 204
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id
        ]);
    }
}
