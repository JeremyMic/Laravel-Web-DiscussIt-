<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TrimStrings;
use App\Models\Post;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ReplyController extends Controller
{
    public function replies($id) {
        $user = auth()->user();

        $data = Post::query()->join(
            'category_details','post_id','=','id'
        )->join(
            'categories','categories.id','=','category_id'
        )->join(
            'post_details','post_details.post_id','=','posts.id'
        )->join (
            'users','users.id','=','post_details.user_id'
        )->where('posts.id', '=', "{$id}")->first();
    
        $replies = Post::query()->join(
            'replies', 'post_id', '=', 'posts.id'
        )->join(
            'users', 'users.id', '=', 'user_id'
        )->where('posts.id', '=', "{$id}")->get();
        return view('Post/replies', compact('data','replies'));
    }

    public function addReply(Request $request) {
        $user = auth()->user();

        $reply = trim($request->reply);
        $post_id = $request->post_id;

        if (empty($reply)) {
            $errors = new MessageBag(['input' => ['Comment must be filled']]);
            return redirect()->back()->withErrors($errors);
        }

        Reply::create([
            'user_id'=>$user->id,
            'post_id'=>$post_id,
            'reply_content' => $reply,
            'reply_date'=> Carbon::now(),
        ]);

        return redirect('/replies/'.$post_id);
    }
}
