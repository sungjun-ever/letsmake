<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Free;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('dashboard.index', compact('user'));
    }

    public function userTasks(){
        $id = auth()->user()->id;
        $tasks = Free::where('user_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.task', compact('tasks'));
    }

    public function userComments()
    {
        $id = auth()->user()->id;
        $comments = Comment::where('user_id', $id)->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.comment', compact('comments'));
    }
}
