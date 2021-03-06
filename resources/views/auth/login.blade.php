@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto mt-20">
        <div class="max-w-xl mx-auto">
            <form class="p-4 shadow-md" action="/auth/login" method="post">
                @csrf
                <p>
                    <label for="email" class="inline-block w-1/5">이메일</label>
                    <input id="email" type="email" name="email" class="outline-none border-2 border-blue-200 w-4/6">
                </p>
                <p class="mt-2">
                    <label for="password" class="inline-block w-1/5">비밀번호 </label>
                    <input id="password" type="password" name="password" class="outline-none border-2 border-blue-200 w-4/6">
                </p>
                <div class="mt-8 mx-auto flex justify-evenly max-w-sm">
                    <button type="submit" class="px-4 py-1 bg-green-500 hover:bg-green-800
                            text-gray-100 rounded-md focus:outline-none">로그인</button>
                    <span class="px-2"></span>
                    <button type="submit" class="px-4 py-1 bg-red-500 hover:bg-red-800
                            text-gray-100 rounded-md focus:outline-none">취소</button>
                </div>
            </form>
        </div>
    </div>
@stop
