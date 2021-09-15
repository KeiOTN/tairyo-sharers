<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col -m-2">
                {{-- profile --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full mt-4"
                    onClick="location.href='{{ route('profile', ['id' => Auth::id()]) }}'">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">マイプロフィール</h2>
                            <p class="text-gray-500 text-xs">確認/編集</p>
                        </div>
                    </div>
                </div>

                {{-- 出品した魚 --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">出品した魚</h2>
                            <p class="text-gray-500 text-xs">一覧を表示します</p>
                        </div>
                    </div>
                </div>

                {{-- 申込した魚/受け取った魚 --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">申込した魚/受け取った魚 </h2>
                            <p class="text-gray-500 text-xs">一覧を表示します</p>
                        </div>
                    </div>
                </div>

                {{-- 評価 --}}
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <svg class="w-8 mr-4 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">取引評価</h2>
                            <p class="text-gray-500 text-xs">取引評価を表示します</p>
                        </div>
                    </div>
                </div>










            </div>






        </div>
    </div>
</x-app-layout>
