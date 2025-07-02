<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'body'];

    public function post()
    {
        return $this->belongsTo(PostWithDb::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
