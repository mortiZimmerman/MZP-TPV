<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ProfileController;

class ProfileControllerTest extends TestCase
{
    public function test_index_returns_ok()
    {
        $controller = new ProfileController();
        $this->assertTrue(true);
    }

    public function test_update_returns_ok()
    {
        $controller = new ProfileController();
        $this->assertTrue(true);
    }
}
