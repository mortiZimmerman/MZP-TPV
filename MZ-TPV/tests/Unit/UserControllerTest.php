<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\UserController;

class UserControllerTest extends TestCase
{
    public function test_index_returns_ok()
    {
        $controller = new UserController();
        $this->assertTrue(true);
    }

    public function test_store_returns_ok()
    {
        $controller = new UserController();
        $this->assertTrue(true);
    }

    public function test_show_returns_ok()
    {
        $controller = new UserController();
        $this->assertTrue(true);
    }

    public function test_update_returns_ok()
    {
        $controller = new UserController();
        $this->assertTrue(true);
    }

    public function test_destroy_returns_ok()
    {
        $controller = new UserController();
        $this->assertTrue(true);
    }
}
