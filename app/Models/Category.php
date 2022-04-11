<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];

    use HasFactory;
    public $timestamps = false;

    public function category_detail() {
        return $this->hasMany(CategoryDetail::class);
    }
}
