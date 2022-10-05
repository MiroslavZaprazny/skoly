<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollagesTest extends TestCase
{
    public function test_search_returns_data_in_valid_format()
    {
        $response = $this->post('/api/collages', ['search' => 'fei'], ['Content-Type' => 'json']);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description',
                    'founded_at',
                    'ratings' => [
                        '*' => [
                            'id',
                            'user_id',
                            'rating',
                            'body'
                        ]
                    ]
                ]
            ]
        ]);

        $response->assertStatus(200);
    }

    public function test_search_returns_correct_data()
    {
        $response = $this->post('/api/collages', ['search' => 'fei']);

        $response->assertStatus(200);
        $response->assertJson(
            [
                'data' => [
                    [
                        'name' => 'FEI STU'
                    ]
                ]
            ]
        );
    }
}
