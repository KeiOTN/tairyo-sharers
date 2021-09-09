<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-800 leading-tight">
            {{ __('さかな001の受け取りリクエスト一覧') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-4"></div>
            {{-- 受け取り希望① --}}
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full" onClick="location.href='{{ route('pickup_request_list') }}'">
                <div class="h-full flex flex-col items-center border-gray-200 border p-4 rounded-lg bg-white">
                    <svg class="w-8 mr-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 title-font font-medium">◯◯さんから受け取り希望が届いています
                        </h2>
                        <p class="text-gray-500 text-xs">受け取り希望場所: ◯◯漁港/<span
                                class="text-red-600 text-xs">本日</span>/17:00</p>
                    </div>
                    <div class="flex flex-row">
                        <button onClick="location.href=''"
                            class="flex text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-xs m-4 shadow-md">
                            この人にあげる！</button>
                        <button onClick="location.href=''"
                            class="flex text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-xs m-4 shadow-md">お断りする</button>
                    </div>
                </div>
            </div>

            {{-- 受け取り希望② --}}
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full" onClick="location.href='{{ route('pickup_request_list') }}'">
                <div class="h-full flex flex-col items-center border-gray-200 border p-4 rounded-lg bg-white">
                    <svg class="w-8 mr-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 title-font font-medium">△△さんから受け取り希望が届いています
                        </h2>
                        <p class="text-gray-500 text-xs">受け取り希望場所: △△釣具店/<span
                                class="text-red-600 text-xs">本日</span>/18:00</p>
                    </div>
                    <div class="flex flex-row">
                        <button onClick="location.href=''"
                            class="flex text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-xs m-4 shadow-md">
                            この人にあげる！</button>
                        <button onClick="location.href=''"
                            class="flex text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-xs m-4 shadow-md">お断りする</button>
                    </div>
                </div>
            </div>

            {{-- 受け取り希望③ --}}
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full" onClick="location.href='{{ route('pickup_request_list') }}'">
                <div class="h-full flex flex-col items-center border-gray-200 border p-4 rounded-lg bg-white">
                    <svg class="w-8 mr-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 title-font font-medium">□□さんから受け取り希望が届いています
                        </h2>
                        <p class="text-gray-500 text-xs">受け取り希望場所: △△釣具店/<span
                                class="text-red-600 text-xs">本日</span>/18:00</p>
                    </div>
                    <div class="flex flex-row">
                        <button onClick="location.href=''"
                            class="flex text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-xs m-4 shadow-md">
                            この人にあげる！</button>
                        <button onClick="location.href=''"
                            class="flex text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-xs m-4 shadow-md">お断りする</button>
                    </div>
                </div>
            </div>



        </div>
    </div>
</x-app-layout>
