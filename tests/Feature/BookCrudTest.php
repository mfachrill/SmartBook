<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_book()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user);

        $response = $this->post('/my-books', [
            'title' => 'Buku Tes',
            'author' => 'Penulis Tes',
            'description' => 'Deskripsi buku tes.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('books', ['title' => 'Buku Tes']);
    }

    public function test_user_can_update_a_book()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user);

        $book = Book::factory()->create(['user_id' => $user->id]);

        $response = $this->put("/my-books/{$book->id}", [
            'title' => 'Judul Baru',
            'author' => $book->author,
            'description' => $book->description,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('books', ['id' => $book->id, 'title' => 'Judul Baru']);
    }

    public function test_user_can_delete_a_book()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        $this->actingAs($user);

        $book = Book::factory()->create(['user_id' => $user->id]);

        $response = $this->delete("/my-books/{$book->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}