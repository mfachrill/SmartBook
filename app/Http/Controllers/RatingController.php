<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'value' => 'required|integer|min:1|max:5',
        ]);

        Rating::updateOrCreate(
            [
                'book_id' => $book->id,
                'user_id' => Auth::id(),
            ],
            [
                'value' => $request->value,
            ]
        );

        return back()->with('success', 'Rating berhasil dikirim.');
    }
}
