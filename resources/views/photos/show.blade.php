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
        </div>
    </div>
@stop
