@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20 text-right">
            <a href="{{route('photos.create')}}"><span><i class="xi-pen pr-1"></i>글쓰기</span></a>
        </div>
        <div class="flex max-w-7xl xl:max-w-5xl mx-auto mt-6 grid grid-cols-4">
            @foreach($photos as $photo)
                <div class="shadow-lg m-2 flex flex-col rounded-lg overflow-hidden">
                    <img src="{{asset('images/'.$photo->imageName)}}" alt="{{$photo->imageName}}" class="h-48">
                    <a href="{{route('photos.show', $photo->id)}}"><h3 class="mb-4 mt-2 text-2xl px-4">{{$photo->title}}</h3></a>
                    <div class="mb-4 text-grey-darker text-sm flex-1 px-4">
                        <p>{{$photo->story}}</p>
                    </div>
                    <p class="border-t border-grey-light pl-2 py-1 text-xs text-gray-400 no-underline tracking-wide">
                        {{$photo->user_name}}
                    </p>
                </div>
        @endforeach
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
