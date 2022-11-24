<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPSTORM_META\map;

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
                    'average_rating',
                    'rating_count',
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

    public function test_show_method_returns_data_in_valid_format()
    {
        $response = $this->get('/api/collage/1');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'description',
                'founded_at',
                'average_rating',
                'rating_count',
                'ratings' => [
                    [
                        'id',
                        'rating',
                        'body',
                        'user' => [
                            'id',
                            'name',
                            'email'
                        ]
                    ]
                ]
            ]
        ]);
    }
    public function test_show_method_returns_correct_data()
    {
        $response = $this->get('/api/collage/1');

        $response->assertStatus(200);
        $response->assertJson(
            [
                'data' => [
                    'id' => 1,
                    'name' => 'FEI STU',
                    'average_rating' => 3,
                    'rating_count' => 1,
                ]
            ]
        );
    }
}
