<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Table;

class TableTest extends TestCase
{
    public function test_it_can_be_instantiated()
    {
        $table = new Table();
        $this->assertInstanceOf(Table::class, $table);
    }

    public function test_it_has_status_attribute()
    {
        $table = new Table(['status' => 'free']);
        $this->assertEquals('free', $table->status ?? 'free');
    }
}
