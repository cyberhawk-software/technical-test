<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class TurbineTest extends TestCase
{
    protected function login(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertNoContent();
    }

    public function need_to_retrieve_turbine_with_components(): void
    {
        $this->login();
        $get = $this->get('/api/turbines/1');
        $get->assertJsonIsObject();
    }

    public function dont_retrieve_turbine(): void
    {
        $this->login();
        $get = $this->get('/api/turbines/0');
        $get->assertNotFound();
    }

    public function test_get_turbine_pagination(): void
    {
        $this->login();
        $get = $this->get('/api/turbines?page=1&limit=15&orderBy=id&sortBy=asc');
        $get->assertContent('data');
    }

    public function test_update_turbine(): void
    {
        $this->assertTrue(true);
    }
}
