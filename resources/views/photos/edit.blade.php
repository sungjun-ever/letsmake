@extends('layouts.app')
@section('title', $photo->title)

@section('content')
    <div class="max-w-7xl mx-auto mt-24">
        <div class="max-w-5xl mx-auto">
            <form class="w-full" action="{{route('photos.update', $photo->id)}}" method="post">
                @csrf
                @method('put')
                <p>
                    <label for="title"></label>
                    <input id="title" type="text" name="title"
                           class="border-2 border-blue-200 w-full py-1 rounded-md px-1 focus:border-gray-600 focus:outline-none"
                           placeholder="제목을 입력하세요." value="{{$photo->title}}">
                </p>
                <p class="mt-8">
                    <label for="story"></label>
                    <textarea id="story" name="story"
                              class="border-2 border-blue-200 rounded-md focus:border-gray-600 focus:outline-none
                              resize-none w-full h-screen px-1 py-1" placeholder="내용을 입력하세요.">{{$photo->story}}</textarea>
                </p>

                <p class="mt-8 text-center">
                    <button type="submit" class="px-4 py-1 bg-blue-400 hover:bg-blue-700 text-gray-100
                    rounded-md focus:outline-none">수정</button>
                    <span class="px-4"></span>
                    <button type="submit" class="px-4 py-1 bg-red-400 hover:bg-red-700 text-gray-100 rounded-md focus:outline-none"
                            onclick="history.back()">취소</button>
                </p>
            </form>
        </div>
    </div>
@stop
