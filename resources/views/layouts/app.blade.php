<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    <title>@yield('title', 'PORT')</title>
</head>
<body>
    <header class="max-w-7xl mx-auto py-2 shadow-md">
        <div class="flex justify-content">
            <div class="flex-1 text-center">
                <a href="{{route('home')}}"><span>LOGO</span></a>
            </div>
            <nav class="flex-1">
                <div class="flex justify-around">
                    <a href="{{route('frees.index')}}">
                    <button class="hover:text-gray-400 focus:outline-none">
                        <span>자유게시판</span>
                    </button>
                    </a>
                    <button class="hover:text-gray-400 focus:outline-none">
                        <span>자유게시판</span>
                    </button>
                    <button class="hover:text-gray-400 focus:outline-none">
                        <span>자유게시판</span>
                    </button>

                </div>
            </nav>

            <div class="flex-1 text-center">
                @guest()
                <a href="{{route('users.login')}}">
                <button class="hover:text-gray-400 focus:outline-none">
                    <span>로그인</span>
                </button>
                </a>
                <span class="px-1"></span>
                <a href="{{route('users.register')}}">
                <button class="hover:text-gray-400 focus:outline-none">
                    <span>회원가입</span>
                </button>
                </a>
                @endguest
                @auth()
                    <button class="hover:text-gray-400 focus:outline-none">
                        <span>{{auth()->user()->name}}</span>
                    </button>
                    <span class="px-1"></span>
                    <form class="inline-block" action="{{route('users.logout')}}" method="post">
                        @csrf
                        <button class="hover:text-gray-400 focus:outline-none">
                            <span>로그아웃</span>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <section class="max-w-7xl mx-auto">
    @section('content')
    @show
    </section>

    <footer class="max-w-7xl mx-auto mt-24">
        <div class="max-w-5xl mx-auto">
            copyright
        </div>
    </footer>
</body>
</html>

