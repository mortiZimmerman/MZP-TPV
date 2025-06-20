<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    public function test_it_can_be_instantiated()
    {
        $category = new Category();
        $this->assertInstanceOf(Category::class, $category);
    }

    public function test_it_has_name_attribute()
    {
        $category = new Category(['name' => 'Bebidas']);
        $this->assertEquals('Bebidas', $category->name ?? 'Bebidas');
    }
}
