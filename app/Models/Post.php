<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable  = ['title', 'excerpt', 'body', 'category_id', 'slug', 'user_id', 'thumbnail'];
    use HasFactory;
    protected $with = ['category', 'author', 'comments'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search .   '%')
            )
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query
                ->whereHas(
                    'author',
                    fn ($query) => $query->where('username', $author)
                )
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query
                ->whereHas(
                    'category',
                    fn ($query) => $query->where('slug', $category)
                )
        );
    }
}
