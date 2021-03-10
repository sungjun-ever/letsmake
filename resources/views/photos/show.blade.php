@extends('layouts.app')
@section('title', $photo->title)

@section('content')
    <div class="max-w-7xl mx-auto mt-24">
        <div class="max-w-5xl mx-auto">
            <p class="border-b-2 border-blue-400 py-1 text-xl font-semibold overflow-hidden overflow-ellipsis whitespace-nowrap">{{$photo->title}}</p>
            <div class="mt-8 h-screen">
                {{$photo->story}}
                @if($photo->imageName)
                    <div class="flex justify-center mt-2">
                        <img src="{{asset('images/'.$photo->imageName)}}" alt="{{$photo->imageName}}">
                    </div>
                @endif
            </div>
            @auth()
                @if(auth()->user()->id == $photo->user_id)
                    <div class="mt-6 text-right">
                        <a href="{{route('photos.edit', $photo->id)}}">
                            <i class="xi-pen-o pr-4 hover:text-blue-400 cursor-pointer">
                                <button>수정</button>
                            </i>
                        </a>
                        <form class="inline-block" action="{{route('photos.destroy', $photo->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <i class="xi-cut hover:text-blue-400 cursor-pointer">
                                <button>삭제</button>
                            </i>
                        </form>
                    </div>
                @endif
            @endauth

{{--            --}}{{--     댓글       --}}
{{--            <div class="max-w-5xl mx-auto mt-8">--}}
{{--                <div class="border-b-2 border-gray-200">--}}
{{--                    <span class="inline-block pb-2">댓글</span>--}}
{{--                </div>--}}
{{--                --}}{{--     댓글 목록       --}}
{{--                <div class="max-w-5xl mx-auto mt-6">--}}
{{--                    @foreach($comments as $comment)--}}
{{--                        <div class="border-b-2 border-dashed border-gray-300 mt-4">--}}
{{--                            <p class="text-left text-sm pl-1 pb-1">{{$comment->user_name}}</p>--}}
{{--                            @if($comment->status == false)--}}
{{--                                <p class="pb-2 text-gray-400">{{$comment->story}}</p>--}}
{{--                            @else--}}
{{--                                <p class="pb-2">{{$comment->story}}</p>--}}
{{--                                @auth()--}}
{{--                                    @if(auth()->user()->id == $comment->user_id)--}}
{{--                                        <form action="{{route('comments.destroy', $comment->id)}}" method="post" class="text-sm pb-2 inline-block w-full">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <p class="text-right">--}}
{{--                                                <i class="xi-cut hover:text-blue-400 cursor-pointer">--}}
{{--                                                    <button type="submit">삭제</button>--}}
{{--                                                </i>--}}
{{--                                            </p>--}}
{{--                                        </form>--}}
{{--                                    @endif--}}
{{--                                @endauth--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                --}}{{--     댓글 작성       --}}
{{--                @auth()--}}
{{--                    <form action="{{route('frees.comments.store', $photo->id)}}" method="post" class="mt-8">--}}
{{--                        @csrf--}}
{{--                        <label for="story"></label>--}}
{{--                        <textarea id="story" name="story"--}}
{{--                                  class="border w-full resize-none outline-none rounded-lg h-24 px-2 pt-1"></textarea>--}}
{{--                        <p class="text-right mt-2">--}}
{{--                            <button class="bg-blue-300 text-gray-100 px-4 py-1 rounded-md">작성</button>--}}
{{--                        </p>--}}
{{--                    </form>--}}
{{--                @endauth--}}
{{--            </div>--}}
        </div>
    </div>
@stop
