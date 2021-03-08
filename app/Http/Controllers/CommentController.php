<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id)
    {
        $validation = request()->validate([
           'story' => 'required'
        ]);
        $comment = new Comment();
        $comment->free_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->user_name = auth()->user()->name;
        $comment->story = $validation['story'];
        $comment->save();


        return redirect()->route('frees.show', $id);
    }

    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->first();
        $comment->story = '삭제된 댓글입니다.';
        $comment->status = false;
        $comment->save();

        return redirect()->route('frees.show', $id);
    }
}
