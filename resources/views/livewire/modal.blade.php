<div>
    <!-- Modal -->
    <div x-data="{ open: false }">
        <a href="#main" @click="open = ! open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="size-6 transition-transform cursor-pointer ease-in-out duration-300 hover:scale-125">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        </a>
        @teleport('body')
        <div x-show="open"
             class=" justify-center items-center fixed w-screen h-screen flex pointer-events-none">
            <div class="rounded-lg bg-gray-200 h-3/4 w-3/4 shadow-lg p-10 " >
            </div>
        </div>
        @endteleport
    </div>
</div>
