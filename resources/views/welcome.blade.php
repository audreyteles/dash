<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans w-screen grid grid-cols-1 auto-rows-min h-dvh items-center justify-center scroll-smooth bg-cover"
      style="background-image: url({{asset('dark.png')}})">
<header class="h-[15vh] flex justify-center items-center justify-self-center self-start">
    <nav class="w-[25vw] grid grid-cols-1 justify-center items-center h-full">
        <input type="text" placeholder="Informe a sua busca..."
               class="p-4 w-full text-lg align-middle text-center text-gray-900 rounded-full border-0 shadow-xl focus:ring-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="size-6 absolute justify-self-end mr-4 bg-white m-2 rounded-full">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
        </svg>
    </nav>
</header>
<main class="flex justify-self-center items-center h-[75vh]" id="main">
    <div
        class="grid grid-cols-4 auto-rows-min w-[80vw] items-center justify-center gap-6 justify-self-center align-middle">
        @foreach($cards as $card)
            <a href="{{$card->url}}" target=”_blank” >
                <div class="bg-cover h-40 w-full p-6 rounded-2xl cursor-pointer  transition-all ease-in-out scale-100 duration-300 shadow-sm ring-
        ring-gray-400 hover:shadow-lg hover:scale-[105%] active:scale-95 flex-col flex items-center justify-center bg-gray-100"
                     style="')">
                    <h1 class="text-gray-900 font-extrabold text-xl"> {{$card->name}} </h1>
                    <p class="font-light text-base text-center text-gray-600 ">{{$card->description}}</p>
                </div>
            </a>
        @endforeach
    </div>

</main>
<footer class="fixed bottom-0 flex justify-center w-screen p-8">
    <div
        class="bg-white h-auto p-4 flex items-center w-56 justify-around rounded-full text-gray-300 shadow-2xl bg-opacity-20">
        <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="size-8 transition-transform cursor-pointer ease-in-out duration-300 hover:scale-125">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        </a>
        <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="size-8 transition-transform cursor-pointer ease-in-out duration-300 hover:scale-125">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
            </svg>
        </a>
        @auth
            <form action="{{route('logout')}}" method="post" class="flex justify-center items-center">
                @csrf
                @method('post')
                <button type="submit" class="m-0 w-full h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor"
                         class="size-8 transition-transform cursor-pointer ease-in-out duration-300 hover:scale-125">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
                    </svg>

                </button>
            </form>
        @else
            <a href="@if(Auth::user()) {{route('login')}} @else {{route('register')}} @endif ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="size-8 transition-transform cursor-pointer ease-in-out duration-300 hover:scale-125">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                </svg>
            </a>
        @endauth
    </div>
</footer>
</body>
</html>
