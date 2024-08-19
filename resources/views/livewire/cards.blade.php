<div class="grid  grid-cols-1 auto-rows-min">
    <header class="h-[25vh] flex justify-center items-center justify-self-center self-start">
        <div class="flex flex-col items-center sm:flex-row">
            <nav
                class="w-[40vw] sm:w-[40vw] md:w-[35vw] lg:w-[25vw] grid grid-cols-1 justify-center items-center h-full">

                <input type="text" wire:model.live="search" placeholder="Informe a sua busca..."
                       class="p-4 w-full text-lg align-middle text-center text-gray-900 rounded-full border-0 shadow-xl focus:ring-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="size-6 absolute justify-self-end mr-4 bg-white m-2 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>

            </nav>
            <select id="tag" name="tag" wire:model.change="tag"
                    class="mx-2 p-4 my-2 sm:my-0 w-full sm:w-56  text-lg align-middle text-center text-gray-600 rounded-full border-0 shadow-xl focus:ring-0 ">
                <option value="0">Categoria</option>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" class="text-gray-600">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

    </header>
    <main
        class="flex flex-col justify-center items-center w-full pb-36 sm:pb-0 h-fit min-h-[50vh]"
        id="main">
        <div
            class="grid w-[80vw] gap-6 sm:gap-2 lg:gap-6 sm:grid-cols-4 lg:grid-cols-4">
            @forelse($cards as $card)
                <a href="{{$card->url}}" target=”_blank”>
                    <div class="justify-self-center sm:p-2 bg-cover h-40 w-full p-6 rounded-2xl cursor-pointer  transition-all ease-in-out scale-100 duration-300 shadow-sm ring-
        ring-gray-400 hover:shadow-lg hover:scale-[105%] active:scale-95 flex-col flex items-center justify-center bg-gray-100"
                    >
                        <h1 class="text-gray-900 font-extrabold text-xl"> {{$card->name}} </h1>
                        <p class="font-light text-base text-center text-gray-600 hidden md:flex lg:flex">{{$card->description}}</p>

                        <div class="rounded-full w-fit h-fit text-amber-500 border-2 px-2 border-amber-500 justify-center flex text-[0.7rem]">
                            {{$card->tag->name}}
                        </div>
                    </div>
                </a>
            @empty
                <div
                    class="sm:p-2 bg-cover h-40 w-full p-6 rounded-2xl shadow-sm flex-col flex items-center justify-center text-gray-50 col-span-4">
                    <p class="font-normal text-xl text-center flex">Nenhum sistema encontrado!</p>
                </div>
            @endforelse

        </div>
        <div class="text-gray-50 w-full justify-center">
            {{ $cards->links() }}
        </div>
    </main>
    <footer class="fixed bottom-0 flex justify-center w-screen p-8">
        <div
            class="bg-white h-auto p-4 flex items-center w-56 justify-around rounded-full text-gray-300 shadow-2xl bg-opacity-20">
            @auth
                <a href="{{route('create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor"
                         class="size-8 transition-transform cursor-pointer ease-in-out duration-300 hover:scale-125">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </a>
            @else
                <div>
                    <div class="disabled ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor"
                             class="size-8 transition-transform pointer-events-none text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </div>
                </div>
            @endauth
            <a href="{{route('dash')}}">
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
</div>
