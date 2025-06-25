<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_add_rating()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $book = Book::factory()->create();

        $this->actingAs($user);
        $response = $this->post("/books/{$book->id}/rate", [
            'value' => 4,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('ratings', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'value' => 4,
        ]);
    }

    public function test_authenticated_user_can_update_existing_rating()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $book = Book::factory()->create();

        Rating::factory()->create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'value' => 2,
        ]);

        $this->actingAs($user);
        $response = $this->post("/books/{$book->id}/rate", [
            'value' => 5,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('ratings', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'value' => 5,
        ]);
    }
}
