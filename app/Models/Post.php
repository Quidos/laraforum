<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function category() {
        return $this->belongsTo(Thread::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
