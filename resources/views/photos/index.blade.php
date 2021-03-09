@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20 text-right">
            <a href="{{route('frees.create')}}"><span><i class="xi-pen pr-1"></i>글쓰기</span></a>
        </div>
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-6">
            <table class="w-full table-fixed">
                <tr>
                    <td class="w-2/12"></td>
                    <td class="w-7/12 ..."></td>
                    <td class="w-1/12"></td>
                    <td class="w-2/12"></td>
                </tr>
                @foreach($photos as $photo)
                    <tr class="border-b">
                        <td class="text-center py-1">{{$photo->id}}</td>
                        <td class="text-left overflow-hidden overflow-ellipsis whitespace-nowrap"><a href="{{route('photos.show', $photo->id)}}">
                                {{$photo->title}}</a></td>
                        <td class="text-center">{{$photo->user_name}}</td>
                        <td class="text-center">{{$photo->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="max-w-7xl lg:max-w-5xl mx-auto mt-8 text-center">
            <form action="{{route('frees.search')}}" method="get">
                @csrf
                <label for="search" class="inline-block pr-1"><i class="xi-search"></i></label>
                <input id="search" type="search" name="search"
                       class="border outline-none rounded-md">
                <button type="submit" class="bg-blue-400 hover:bg-blue-700 px-2 rounded-md">
                    <span class="text-sm text-gray-100">검색</span>
                </button>
            </form>
        </div>
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20">
            {{$photos->links()}}
        </div>
    </div>
@stop
