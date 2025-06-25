<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicBookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('user')
            ->withRatingData()
            ->when($request->filled('author'), fn($q) =>
                $q->where('author', 'ilike', "%{$request->author}%")
            )
            ->when($request->filled('uploaded_at'), fn($q) =>
                $q->whereDate('created_at', $request->uploaded_at)
            )
            ->when($request->filled('rating'), function ($q) use ($request) {
                $q->whereRaw(
                    'FLOOR(COALESCE((select AVG(value) from ratings where ratings.book_id = books.id), 0)) = ?',
                    [$request->rating]
                );
            });

        $sortBy = $request->input('sort_by', 'newest');
        if ($sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $books = $query->paginate(6)->withQueryString();

        return view('books.public.index', compact('books', 'sortBy'));
    }

    public function show(Book $book)
    {
        $book->load(['user', 'ratings', 'comments.user']);

        $averageRating = round($book->ratings->avg('value'), 1);
        $ratingCount = $book->ratings->count();

        return view('books.public.show', compact('book', 'averageRating', 'ratingCount'));
    }
}
