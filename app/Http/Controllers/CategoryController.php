<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\VoteDetail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory() {
        $data = Category::query()->paginate(10);
    
        return view('Category/category', compact('data'));
    }

    public function viewPostCategory($id) {
        $data = Post::query()->join(
            'category_details', 'category_details.post_id', '=', 'posts.id'
        )->join(
            'categories', 'categories.id', '=', 'category_id'
        )->join(
            'post_details', 'post_details.post_id', '=', 'posts.id'
        )->join(
            'users', 'users.id', '=', 'user_id'
        )->where(
            'category_id', '=', "{$id}"
        )->paginate(10);

        $vote = null;
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $vote = VoteDetail::query()->where(
                'user_id','=',"{$user_id}"
            )->get();
        }

        return view('home',compact('data', 'vote'));
    }
}
