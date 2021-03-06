@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20 text-right">
            <a href="{{route('frees.create')}}"><span><i class="xi-pen pr-1"></i>글쓰기</span></a>
        </div>
        <div class="max-w-7xl xl:max-w-5xl h-screen mx-auto mt-6">
            <table class="w-full">
                <tr>
                    <td class="w-2/12"></td>
                    <td class="w-7/12"></td>
                    <td class="w-1/12"></td>
                    <td class="w-2/12"></td>
                </tr>
            @foreach($tasks as $task)
                <tr class="border-t">
                    <td class="text-center py-1">{{$task->id}}</td>
                    <td class="text-left"><a href="{{route('frees.show', $task->id)}}">{{$task->title}}</a></td>
                    <td class="text-center">{{$task->user_name}}</td>
                    <td class="text-center">{{$task->created_at->format('Y-m-d')}}</td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
@stop
