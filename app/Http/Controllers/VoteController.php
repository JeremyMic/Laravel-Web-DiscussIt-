<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\VoteDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    public function doUpVote($id) {
        $user = auth()->user();

        $post = Post::find($id);

        $vote = VoteDetail::query()->where(
            'user_id','=',"{$user->id}"
        )->where(
            'post_id','=',"{$post->id}"
        )->first();

        // not yet upvote and downvote
        if ($vote == null) {
            VoteDetail::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'vote_id' => 2,
            ]);
        } else if ($vote->vote_id == 2) {
            $vote->delete();

        } else if ($vote->vote_id == 1) {
            $vote->vote_id = 2;
            $vote->save();
        }

        return back();
    }

    public function doDownVote($id) {
        $user = auth()->user();

        $post = Post::find($id);

        $vote = VoteDetail::query()->where(
            'user_id','=',"{$user->id}"
        )->where(
            'post_id','=',"{$post->id}"
        )->first();
        Log::info($vote);
        // not yet upvote and downvote
        if ($vote == null) {
            VoteDetail::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'vote_id' => 1,
            ]);
        } // if downvote --> remove
        else if ($vote->vote_id == 1) {
            $vote->delete();

        } // if upvote --> downvote 
        else if ($vote->vote_id == 2) {
            $vote->vote_id = 1;
            $vote->save();
        }

        return back();
    }
}
