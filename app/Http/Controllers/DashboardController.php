<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookCount = Book::count();
        $verifiedCount = User::whereNotNull('email_verified_at')->count();
        $unverifiedCount = User::whereNull('email_verified_at')->count();

        $booksPerMonth = Book::selectRaw("to_char(created_at, 'Mon YYYY') as month, count(*) as total")
            ->groupBy('month')
            ->orderByRaw("MIN(created_at)")
            ->pluck('total', 'month')
            ->toArray();

        return view('dashboard', compact(
            'user',
            'bookCount',
            'verifiedCount',
            'unverifiedCount',
            'booksPerMonth'
        ));
    }
}
