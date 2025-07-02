<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostWithDb extends Model
{
    use HasFactory;

    protected $table = 'post_with_db';

    protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'slug', 'user_id', 'thumbnail'];

    protected $with = ['category', 'author']; // by this whenever there is a call to get posts then category and author will also come

    public function scopeFilter($query)
    {
        // $posts = PostWithDb::latest(); //-----------> If you want to show the Latest on the First and  here the query is not running its just building a query

        // if (request('search')) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        //Above Same Thing using When

        $query->when(request('search') ?? false, function ($query, $search) {
            // $query
            //     ->where('title', 'like', '%' . $search . '%')
            //     ->orWhere('body', 'like', '%' . $search . '%');
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when(request('author') ?? false, function ($query, $author) {
            $query
                ->where('user_id', function ($subquery) use ($author) {
                    $subquery->select('id')
                        ->from('users')
                        ->where('username', $author);
                });
        });

        $query->when(request('category') ?? false, function ($query, $category) {
            $query
                ->where('category_id', function ($subquery) use ($category) {
                    $subquery
                        ->select('id')
                        ->from('categories')
                        ->where('slug', $category);
                });
        });
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class, 'post_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
