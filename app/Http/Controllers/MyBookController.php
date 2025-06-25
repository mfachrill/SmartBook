<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MyBookController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $books = Book::withAvg('ratings', 'value')
            ->withCount('ratings')
            ->where('user_id', Auth::id())
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'ilike', "%{$request->search}%")
                      ->orWhere('author', 'ilike', "%{$request->search}%");
                });
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('books.my.index', compact('books'));
    }

    // Method lainnya tetap sama...
    public function create()
    {
        return view('books.my.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Auth::user()->books()->create($data);
        return redirect()->route('books.my.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $my_book)
    {
        $this->authorize('update', $my_book);
        return view('books.my.edit', ['book' => $my_book]);
    }

    public function update(Request $request, Book $my_book)
    {
        $this->authorize('update', $my_book);

        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($my_book->thumbnail) {
                Storage::disk('public')->delete($my_book->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $my_book->update($data);
        return redirect()->route('books.my.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $my_book)
    {
        $this->authorize('delete', $my_book);
        if ($my_book->thumbnail) {
            Storage::disk('public')->delete($my_book->thumbnail);
        }
        $my_book->delete();
        return redirect()->route('books.my.index')->with('success', 'Buku berhasil dihapus.');
    }
}