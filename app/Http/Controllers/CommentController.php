<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request, Book $book)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $book->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back();
    }

    public function destroy(Book $book, Comment $comment)
    {
        if ($comment->book_id !== $book->id) {
            abort(403);
        }

        $this->authorize('delete', $comment);
        $comment->delete();

        return back();
    }
}
