<?php

namespace App\Http\Controllers;

use App\Models\Free;
use Illuminate\Http\Request;

class FreeController extends Controller
{

    public function index()
    {
        return view('frees.index');
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

        dd($validation);

        $task = new Free();
        $task->title = $validation['title'];
        $task->story = $validation['story'];
        $task->save();
        return redirect('frees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
