@extends('layouts.app')

@section('content')
    <div class="max-w-7xl xl:max-w-2xl mx-auto mt-12 shadow-lg px-4 py-6">
        <div class="xl:max-w-xl">
            <div class="border-b-2 border-blue-200 w-1/6 pb-1">자유게시판</div>
        </div>
        <table class="w-full table-fixed mt-4">
            <tr>
                <td class="w-7/12"></td>

                <td class="w-2/12"></td>
            </tr>
            @foreach($frees as $free)
                <tr class="border-b">
                    <td class="text-left overflow-hidden overflow-ellipsis whitespace-nowrap"><a href="{{route('frees.show', $free->id)}}">{{$free->title}}</a></td>
                    <td class="text-right">{{$free->created_at->format('m-d')}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@stop
