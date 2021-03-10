<?php

namespace App\Http\Controllers;

use App\Models\Qna;
use Illuminate\Http\Request;

class QnaController extends Controller
{
    public function index()
    {
        $qnas = Qna::orderBy('id', 'desc')->paginate(10);
        return view('qnas.index', compact('qnas'));
    }

    public function show($id)
    {
        $qna = Qna::where('id', $id) -> first();

        return view('qnas.show', compact('qna'));
    }

    public function create(){
        return view('qnas.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
           'title' => 'required|max:30',
           'story' => 'required'
        ]);

        $qna = new Qna();
        $qna -> user_id = auth()->user()->id;
        $qna -> user_name = auth()->user()->name;
        $qna -> title = $validation['title'];
        $qna -> story = $validation['story'];
        $qna -> save();

        return redirect()->route('qnas.show',$qna->id);
    }

    public function edit($id)
    {
        $qna = Qna::where('id', $id) -> first();

        return view('qnas.edit', compact('qna'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request -> validate([
           'title' => 'required|max:30',
           'story' => 'required'
        ]);
        $qna = Qna::where('id', $id) -> first();
        $qna -> title = $validation['title'];
        $qna -> story = $validation['story'];
        $qna -> save();

        return redirect()->route('qnas.show', $id);
    }

    public function destroy($id)
    {
        $qna = Qna::where('id', $id) -> first();
        $qna -> delete();

        return redirect()->route('qnas.index');
    }



}
