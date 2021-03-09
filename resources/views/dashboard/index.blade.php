@extends('layouts.app')

@section('content')
    <div class="flex max-w-7xl lg:max-w-5xl h-screen mx-auto shadow-md mt-8 border-t">
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
            <div class="flex mx-auto h-screen w-1/2 justify-center items-center">
                <div class="text-sm">
                    <p class="mt-4">이름 : {{$user->name}}</p>
                    <p class="mt-4">이메일 : {{$user->email}}</p>
                    <p class="mt-4">가입 날짜 : {{$user->created_at->format('Y-m-d')}}</p>
                </div>
            </div>
        </div>
    </div>
@stop
