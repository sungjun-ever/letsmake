@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20 text-right">
            <a href="{{route('qnas.create')}}"><span><i class="xi-pen pr-1"></i>글쓰기</span></a>
        </div>
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-6">
            <table class="w-full table-fixed">
                @foreach($qnas as $qna)
                    <tr class="border-b">
                        <td class="text-center py-1 text-sm text-gray-500">질문</td>
                        <td class="text-left overflow-hidden overflow-ellipsis whitespace-nowrap"><a href="{{route('qnas.show', $qna->id)}}">
                                {{$qna->title}}</a></td>
                        <td class="text-center">{{$qna->user_name}}</td>
                        <td class="text-center">{{$qna->created_at->format('Y-m-d')}}</td>
                    </tr>

{{--                    <tr class="border-b text-blue-400">--}}
{{--                        <td class="w-2/12 text-center py-1"><i class="xi-subdirectory-arrow"></i></td>--}}
{{--                        <td class="w-7/12 text-left overflow-hidden overflow-ellipsis whitespace-nowrap"><a href="{{route('qnas.show', $qna->id)}}">--}}
{{--                                {{$qna->title}}</a></td>--}}
{{--                        <td class="w-1/12 text-center">{{$qna->user_name}}</td>--}}
{{--                        <td class="w-2/12 text-center">{{$qna->created_at->format('Y-m-d')}}</td>--}}
{{--                    </tr>--}}
                @endforeach
            </table>
        </div>
{{--        <div class="max-w-7xl lg:max-w-5xl mx-auto mt-8 text-center">--}}
{{--            <form action="{{route('qnas.search')}}" method="get">--}}
{{--                @csrf--}}
{{--                <label for="search" class="inline-block pr-1"><i class="xi-search"></i></label>--}}
{{--                <input id="search" type="search" name="search"--}}
{{--                       class="border outline-none rounded-md pl-1">--}}
{{--                <button type="submit" class="bg-blue-400 hover:bg-blue-700 px-2 rounded-md">--}}
{{--                    <span class="text-sm text-gray-100">검색</span>--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
        <div class="max-w-7xl xl:max-w-5xl mx-auto mt-20">
            {{$qnas->links()}}
        </div>
    </div>
@stop
