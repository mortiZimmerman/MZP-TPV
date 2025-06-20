<?php
namespace Tests\Unit;

use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    public function test_controller_class_exists()
    {
        $this->assertTrue(class_exists(\App\Http\Controllers\ProfileController::class));
    }
}
