@extends('layouts.app')

@section('content')
    <div class="flex max-w-7xl lg:max-w-5xl h-screen mx-auto shadow-md">
        <div class="flex-initial w-1/3">
            <div class="flex flex-col h-screen justify-center items-center border-r">
                <a href="{{route('dashboard.index')}}"
                   class="w-full text-center hover:bg-gray-100 hover:shadow border-b border-t py-8">
                    회원정보
                </a>
                <a href="{{route('dashboard.task')}}"
                   class="w-full text-center hover:bg-gray-100 hover:shadow border-b border-t py-8">
                    작성 게시글
                </a>
                <a href="{{route('dashboard.comment')}}"
                   class="w-full text-center hover:bg-gray-100 hover:shadow border-b border-t py-8">
                    작성 댓글
                </a>
            </div>
        </div>
        <div class="flex-1 w-2/3">
            <div class="flex flex-col w-full h-screen justify-center items-center">
                @foreach($tasks as $task)
                    <div class="w-full border-b pb-1">
                        <a href="{{route('frees.show', $task->id)}}">
                            <span class="w-8/12 inline-block pl-10">{{$task->title}}</span>
                        </a>
                        <span class="w-3/12 inline-block text-right">{{$task->created_at->format('Y-m-d')}}</span>
                    </div>
                @endforeach
                <div class="pt-12">
                    {{$tasks->appends('userTasks')->links()}}
                </div>
            </div>
{{--            <div class="flex mx-auto h-screen w-1/2 justify-center items-center">--}}
{{--                <div class="text-sm">--}}
{{--                    <p class="mt-4">이름 : {{$user->name}}</p>--}}
{{--                    <p class="mt-4">이메일 : {{$user->email}}</p>--}}
{{--                    <p class="mt-4">가입 날짜 : {{$user->created_at}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@stop
