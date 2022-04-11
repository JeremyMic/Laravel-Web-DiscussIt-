<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'post_date',
    ];

    use HasFactory;
    public $timestamps = false;

    public function post_detail() {
        return $this->hasOne(PostDetail::class);
    }

    public function category_detail() {
        return $this->hasOne(CategoryDetail::class);
    }

    public function reply() {
        return $this->hasMany(Reply::class);
    }
}
