<?php

namespace App\Http\Controllers;

use App\Models\Qna;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function reply($id)
    {
        return view('qnas.reply', compact('id'));
    }

    public function replyStore(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required|max:30',
            'story' => 'required'
        ]);

        $qna = Qna::where('id', $id)->first();

        $repl = new Reply();
        $repl -> qna_id = $id;
        $repl -> user_id = auth()->user()->id;
        $repl -> user_name = auth()->user()->name;
        $repl -> title = $validation['title'];
        $repl -> story = $validation['story'];
        $repl -> save();

        $qna -> reply = true;
        $qna -> save();

        return redirect()->route('qnas.show', $repl->id);
    }
}
