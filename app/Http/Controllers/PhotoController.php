<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PhotoController extends Controller
{

    public function index()
    {
        return view('photos.index');
    }


    public function create()
    {
        return view('photos.create');
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
           'title' => 'required|max:30',
           'story' => 'required',
           'image' => 'file|mimes:jpg, bmp, png',
        ]);

        $photo = new Photo();
        $photo->user_id = auth()->user()->id;
        $photo->title = $validation['title'];
        $photo->story = $validation['story'];

        if($request->file('image')){
            $imgName = date('mdyHis').uniqid().'.jpeg';
            $path = $request->file('image')->storeAs('public/images', $imgName);
            $imgResize = Image::make(storage_path('app/public/images/'. $imgName))
                ->resize(500, 300)->save(storage_path('app/public/images/'. $imgName));
            $photo->imageUrl = $path;
            $photo->imageName = $imgName;
        }

        $photo->save();
        return redirect()->route('photos.show', $photo->id);
    }


    public function show($id)
    {
        $photo = Photo::where('id', $id)->first();
        return view('photos.show', compact('photo'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
