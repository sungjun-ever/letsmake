@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto mt-24">
        <div class="max-w-5xl mx-auto">
            <p class="border-b-2 border-blue-400 py-1 text-xl font-semibold">{{$task->title}}</p>
            <div class="mt-8 h-screen">{{$task->story}}</div>
            @auth()
            @if(auth()->user()->id == $task->user_id)
            <div class="mt-6">
                <a href="{{route('frees.edit', $task->id)}}">
                    <i class="xi-pen-o pr-4 hover:text-blue-400 cursor-pointer">
                        <button>수정</button>
                    </i>
                </a>
                <form class="inline-block" action="{{route('frees.destroy', $task->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <i class="xi-cut hover:text-blue-400 cursor-pointer">
                        <button>삭제</button>
                    </i>
                </form>

            </div>
            @else
                <div></div>
            @endif
            @endauth
        </div>
    </div>
@stop
