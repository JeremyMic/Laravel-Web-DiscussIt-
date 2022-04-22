<?php

namespace App\Http\Controllers;

use App\Models\CategoryDetail;
use App\Models\Post;
use App\Models\PostDetail;
use App\Models\VoteDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class PostController extends Controller
{
    public function index() {
        $data = Post::query()->join(
            'post_details','post_id','=','id'
        )->join (
            'users','users.id','=','post_details.user_id'
        )->orderBy('posts.id', 'asc')->paginate(10);


        $vote = null;
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $vote = VoteDetail::query()->where(
                'user_id','=',"{$user_id}"
            )->get();
        }

        return view('home',compact('data', 'vote'));
    }

    public function search(Request $request) {
        $query = $request->query('q');

        $data = Post::query()->join(
            'category_details', 'category_details.post_id', '=', 'posts.id'
        )->join(
            'categories', 'categories.id', '=', 'category_id'
        )->join(
            'post_details', 'post_details.post_id', '=', 'posts.id'
        )->join(
            'users', 'users.id', '=', 'user_id'
        )->where(
            'title', 'LIKE', "%{$query}%"
        )->orWhere(
            'content', 'LIKE', "%{$query}%"
        )->orWhere(
            'category_name', 'LIKE', "%{$query}%"
        )->orderBy(
            'posts.id', 'asc'
        )->paginate(10)->appends(['q' => $query]);

        $vote = null;
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $vote = VoteDetail::query()->where(
                'user_id','=',"{$user_id}"
            )->get();
        }

        return view('home', compact('data', 'vote'));
    }

    public function filter(Request $request) {
        $filter = $request->filter;
        $data = null;

        $vote = null;
        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $vote = VoteDetail::query()->where(
                'user_id','=',"{$user_id}"
            )->get();
        }

        if ($filter == 'date') {
            $data = Post::query()->join(
                'post_details','post_id','=','id'
            )->join (
                'users','users.id','=','post_details.user_id'
            )->orderBy('posts.post_date', 'asc')->paginate(10);

            return view('home', compact('data', 'vote'));
        }
    }

    public function validatePost(Request $request) {
        $title = trim($request->title);
        $content = trim($request->content);
        $category = $request->category;

        $error = null;

        $user = auth()->user();

        if (strlen($title) < 3) {
            $error = new MessageBag(['input' => ['Title must be more than 3 characters long!!']]);
        }

        if (strlen($content) < 5) {
            $error = new MessageBag(['input' => ['Content must be more than 5 characters long!!']]);
        }

        if($category == null) {
            $error = new MessageBag(['input' => ['Category cannot be null']]);
        }

        if ($category == -1) {
            $error = new MessageBag(['input' => ['Category cannot be default']]);
        }

        if ($error instanceof MessageBag) {
            return redirect()->back()->withInput()->withErrors($error);
        }

        $new_post = Post::create([
            'title' => $title,
            'content' => $content,
            'post_date' => Carbon::now(),
        ]);

        PostDetail::create([
            'post_id' => $new_post->id,
            'user_id' => $user->id,
        ]);

        CategoryDetail::create([
            'post_id' => $new_post->id,
            'category_id' => $category,
        ]);

        return redirect('/');
    }
}
