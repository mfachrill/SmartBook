<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'author',
        'description',
        'thumbnail',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeWithRatingData($query)
    {
        return $query
            ->select('books.*')
            ->selectSub(function ($q) {
                $q->from('ratings')
                    ->selectRaw('AVG(value)')
                    ->whereColumn('ratings.book_id', 'books.id');
            }, 'average_rating')
            ->selectSub(function ($q) {
                $q->from('ratings')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('ratings.book_id', 'books.id');
            }, 'ratings_count');
    }

    public function scopeFilterByRating($query, $rating)
    {
        if (!is_null($rating)) {
            $query->whereRaw(
                'FLOOR(COALESCE((select AVG(value) from ratings where ratings.book_id = books.id), 0)) = ?',
                [(int) $rating]
            );
        }

        return $query;
    }
}
