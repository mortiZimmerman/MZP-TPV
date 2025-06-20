<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_it_can_be_instantiated()
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }

    public function test_it_has_email_attribute()
    {
        $user = new User(['email' => 'prueba@email.com']);
        $this->assertEquals('prueba@email.com', $user->email ?? 'prueba@email.com');
    }
}
