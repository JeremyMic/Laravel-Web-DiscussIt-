<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryDetail;
use App\Models\Post;
use App\Models\PostDetail;
use App\Models\VoteDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class PostController extends Controller
{
    public function post() {
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

        return view('Post/post',compact('data', 'vote'));
    }

    public function myPost() {
        $id = auth()->user()->id;
        $data = Post::query()->join(
            'post_details','post_id','=','id'
        )->join (
            'users','users.id','=','post_details.user_id'
        )->where(
            'users.id', '=', "{$id}"
        )->orderBy('posts.id', 'asc')->paginate(10);

        $vote = VoteDetail::query()->where(
            'user_id','=',"{$id}"
        )->get();

        return view('Post/my_post',compact('data', 'vote'));
    }

    public function editPost($id) {
        $user_id = auth()->user()->id;

        // $data = Post::query()
        //     ->join('post_detail','posts.id','=','post_id')
        //     ->where('posts.id','=',"{$id}")
        //     ->where('user_id','=',"{$user_id}");
        $data = Post::where('posts.id','=',"{$id}")->first();

        if($data == null || $data->post_detail->user_id != $user_id){
            return redirect('/');
        }

        $category = Category::all();
        $cat_detail = $data->category_detail;
        return view('Post/edit_post', compact('data', 'category', 'cat_detail'));
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

        return view('Post/post', compact('data', 'vote'));
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

    private function postValidation($title, $content, $category) {
        if (strlen($title) < 3) {
            return new MessageBag(['input' => ['Title must be more than 3 characters long!!']]);
        }
        if (strlen($content) < 5) {
            return new MessageBag(['input' => ['Content must be more than 5 characters long!!']]);
        }
        if($category == null) {
            return new MessageBag(['input' => ['Category cannot be null']]);
        }
        if ($category == -1) {
            return new MessageBag(['input' => ['Category cannot be default']]);
        }

        return null;
    }

    public function validateCreatePost(Request $request) {
        $title = trim($request->title);
        $content = trim($request->content);
        $category = $request->category;
        
        $error = $this->postValidation($title, $content, $category);

        if ($error instanceof MessageBag) {
            return redirect()->back()->withInput()->withErrors($error);
        }

        $user = auth()->user();
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

    public function validateEditPost(Request $request) {
        $id = $request->id;
        $title = trim($request->title);
        $content = trim($request->content);
        $category = $request->category;
        
        $error = $this->postValidation($title, $content, $category);

        if ($error instanceof MessageBag) {
            return redirect()->back()->withInput()->withErrors($error);
        }

        // $user = auth()->user();
        $post = Post::find($id);
        $post->update([
            'title'=>$title,
            'content'=>$content
        ]);

        DB::table('category_details')
            ->where('post_id', $id)
            ->update([
                'category_id' => $category,
            ]);
            

        return redirect('/my-post');
    }

    public function deletePost($id) {
        $user = auth()->user();

        $post = Post::find($id);
        // dd($post->title);
        if ($post == null || $post->post_detail->user_id != $user->id) {
            return redirect('/');
        }

        Post::find($id)->delete();

        return redirect('/my-post');
    }   
}
