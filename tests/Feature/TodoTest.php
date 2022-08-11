<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        User::factory()->create();
        $user = User::first();
        $this->actingAs($user);
        $response = $this->post('/api/todo', [
            "name" => "test",
            "data" => "data test"
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => "data created successfully",
        ]);
        $response->assertJsonPath("data.name", "test");
        $response->assertJsonPath("data.data", "data test");
    }
}
