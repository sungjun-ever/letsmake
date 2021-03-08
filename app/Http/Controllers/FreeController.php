<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Free;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreeController extends Controller
{

    public function index()
    {
        $tasks = Free::orderBy('id', 'desc')->paginate(10);
//        $tasks->withPath('free');
        return view('frees.index', compact('tasks'));
    }

    public function create()
    {
        return view('frees.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title'=>'required|max:20',
            'story'=>'required'
        ]);

        $task = new Free();
        $task->user_id = auth()->user()->id;
        $task->user_name = auth()->user()->name;
        $task->title = $validation['title'];
        $task->story = $validation['story'];
        $task->save();
        return redirect()->route('frees.index');
    }

    public function show($id)
    {
        $comments = Comment::where('free_id', $id)->get();
        $task = Free::where('id', $id)->first();
        return view('frees.show', compact(['task', 'comments']));
    }


    public function edit($id)
    {
        $task = Free::where('id', $id)->first();
        return view('frees.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
           'title'=>'required|max:20',
           'story'=>'required'
        ]);

        $task = Free::where('id', $id)->first();
        $task->title = $validation['title'];
        $task->story = $validation['story'];
        $task->save();

        return redirect()->route('frees.show', $id);
    }

    public function destroy($id)
    {
        $task = Free::where('id', $id)->first();
        $task->delete();

        return redirect()->route('frees.index');
    }

    public function search(Request $request){
        $word = $request->search;
        $searches = Free::search($word)->paginate(10);

        return view('frees.search', compact(['searches', 'word']));
    }
}
