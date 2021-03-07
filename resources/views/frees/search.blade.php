@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20 text-right">
            <a href="{{route('frees.create')}}"><span><i class="xi-pen pr-1"></i>글쓰기</span></a>
        </div>
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-6">
            <table class="w-full">
                <tr>
                    <td class="w-2/12"></td>
                    <td class="w-7/12"></td>
                    <td class="w-1/12"></td>
                    <td class="w-2/12"></td>
                </tr>
                @foreach($searches as $search)
                    <tr class="border-t">
                        <td class="text-center py-1">{{$search->id}}</td>
                        <td class="text-left"><a href="{{route('frees.show', $search->id)}}">{{$search->title}}</a></td>
                        <td class="text-center">{{$search->user_name}}</td>
                        <td class="text-center">{{$search->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20">
            {{$searches->appends('search', $word)->links()}}
        </div>
@stop
