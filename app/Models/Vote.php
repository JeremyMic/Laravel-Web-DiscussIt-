<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function vote_detail() {
        return $this->hasMany(VoteDetail::class);
    }
}
