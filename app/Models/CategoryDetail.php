<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    protected $fillable = [
        'post_id',
        'category_id',
    ];

    use HasFactory;
    public $timestamps = false;

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
