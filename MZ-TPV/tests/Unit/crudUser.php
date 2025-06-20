<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class crudUser extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_user()
    {
        $data = [
            'name' => 'Prueba User',
            'email' => 'user@prueba.com',
            'password' => bcrypt('password')
        ];

        $response = $this->post('/users', $data);
        $response->assertStatus(302); // O 201 si es API
        $this->assertDatabaseHas('users', [
            'email' => 'user@prueba.com'
        ]);
    }

    public function test_can_list_users()
    {
        User::factory()->count(3)->create();
        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function test_can_show_user()
    {
        $user = User::factory()->create();
        $response = $this->get('/users/' . $user->id);
        $response->assertStatus(200);
    }

    public function test_can_update_user()
    {
        $user = User::factory()->create();
        $response = $this->put('/users/' . $user->id, [
            'name' => 'Actualizado'
        ]);
        $response->assertStatus(302); // O 200 si es API
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Actualizado'
        ]);
    }

    public function test_can_delete_user()
    {
        $user = User::factory()->create();
        $response = $this->delete('/users/' . $user->id);
        $response->assertStatus(302); // O 204 si es API
        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
}
