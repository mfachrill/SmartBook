<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_post_comment()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $book = Book::factory()->create();
        $this->actingAs($user);

        $response = $this->post("/books/{$book->id}/comments", [
            'content' => 'Komentar dari pengujian.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('comments', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'content' => 'Komentar dari pengujian.',
        ]);
    }

    public function test_user_can_delete_their_comment()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user);

        $book = Book::factory()->create();
        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);

        $response = $this->delete("/books/{$book->id}/comments/{$comment->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
    }
}
