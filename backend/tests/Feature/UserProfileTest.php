<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    private function getUser(): User
    {
        return User::factory()->create([
            'name' => 'test',
            'email' => 'test123@email.com',
            'password' => 'heslo123',
        ]);
    }

    private function login()
    {
        $user = $this->getUser();
        $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'heslo123',
        ]);

        return $user;
    }

    public function test_user_profile_get_request_returns_correct_data()
    {

        $user = $this->login();

        $response = $this->get(sprintf("/api/profile/%s", $user->id));

        $response->assertJson([
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'age' => $user->age,
            ]
        ]);

        $response->assertStatus(200);
    }

    public function user_can_edit_his_profile()
    {
        //TODO
    }
}
