<?php

namespace Tests\Feature;

use App\Models\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RatingLikeTest extends TestCase
{
    use RefreshDatabase;

    private function getRating(): Rating
    {
        $user = $this->login();

        return Rating::factory()->create([
            'user_id' => $user->id,
            'collage_id' => 1,
            'rating' => 5,
            'body' => 'v poho'
        ]);
    }

    public function test_liking_a_review_actually_works()
    {
        $rating = $this->getRating();
        $response = $this->post("/api/rating/$rating->id/like");
        $response->assertStatus(200);

        $this->assertDatabaseHas('rating_likes', ['rating_id' => $rating->id]);
    }
}
