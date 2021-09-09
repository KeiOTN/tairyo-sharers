<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お知らせ') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col -m-2">



                <div class="p-4"></div>
                {{-- お知らせ① --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full" onClick="location.href='{{ route('pickup_request_list') }}'">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-red-300" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">◯◯さんから受け取り希望が届いています
                            </h2>
                            <p class="text-gray-500 text-xs">魚ID:xxx/タイトル:xxxの鯛</p>
                            <p class="text-gray-500 text-xs">受け取り希望場所: ◯◯漁港/<span
                                    class="text-red-600 text-xs">本日</span>/17:00</p>
                        </div>
                    </div>
                </div>

                {{-- お知らせ② --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full" onClick="location.href=''">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-red-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">□□への申込は不成立となりました
                            </h2>
                            <p class="text-gray-500 text-xs">またの機会に期待！</p>
                        </div>
                    </div>
                </div>


                {{-- お知らせ③ --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full" onClick="location.href=''">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-red-300" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">△△さんから受け取り希望が届いています
                            </h2>
                            <p class="text-gray-500 text-xs">魚ID:xxx/タイトル:xxxの鯛</p>
                            <p class="text-gray-500 text-xs">受け取り希望場所: △△釣具屋/<span
                                    class="text-red-600 text-xs">本日</span>/18:00</p>
                        </div>
                    </div>
                </div>

                {{-- お知らせ④ --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full" onClick="location.href=''">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-red-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-red-600 title-font font-medium">**への申込が成立しました！
                            </h2>
                            <p class="text-gray-500 text-xs">魚ID:yyy/タイトル:yyyのブリ</p>
                            <p class="text-red-600 text-xs">本日/20:00</p>
                            <p class="text-gray-500 text-xs">至急内容を確認して魚を受け取ってください！</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
