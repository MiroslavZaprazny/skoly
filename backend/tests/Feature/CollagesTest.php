<?php

namespace Tests\Feature;

use App\Models\Collage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

       Collage::factory()->create([
            'name' => 'FEI STU',
            'description' => 'Poslaním Fakulty elektrotechniky a informatiky, jednej z najstarších
                technických fakúlt na Slovensku s bohatou vedeckou a výskumnou činnosťou, 
                je poskytovanie kvalitného vzdelávania na báze slobodného vedeckého bádania
                a tvorivej výskumnej práce.',
        ]);
    }

    
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
                        'name' => 'FEI STU',
                        //TODO: Add more stuff here?
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
                        'likes',
                        'user' => [
                            'id',
                            'name',
                            'email'
                        ]
                    ]
                ],
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
