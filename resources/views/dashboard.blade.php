<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-700 leading-tight">
            {{ __('Top') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}

            <div class="flex justify-center lg:justify-left">
                {{-- <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div> --}}
                <button onClick="location.href='{{ route('input') }}'"
                    class="flex text-white  border-0 py-2 px-8 focus:outline-none 
                    {{-- bg-blue-500 hover:bg-blue-600 --}}
                    rounded text-md m-4 shadow-md
                    bg-gradient-to-r from-green-400 to-blue-500">
                    魚をあげたい人</button>
                <button onClick="
                    location.href='{{ route('output') }}'"
                    class="
                    flex text-white border-0 py-2 px-8 focus:outline-none 
                    {{-- bg-red-500 hover:bg-red-600 --}}
                   bg-gradient-to-r from-purple-400 via-pink-500 to-red-500
                    rounded text-md m-4 shadow-md">魚がほしい人</button>
            </div>
            {{-- </div> --}}
            {{-- 登録されている魚一覧 --}}
            <div class="flex flex-wrap">
                <p class="px-4 text-gray-600 text-md">取引募集中の魚</p>
                @foreach ($items as $item)
                    <div class="px-4 py-2 md:w-1/4"
                        onClick="location.href='{{ route('detail', ['content_id' => $item['id']]) }}'">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-sm">
                            @if (isset($item['file_path']))
                                {{-- block relative flex justify-center --}}
                                <div class="block relative h-48 rounded overflow-hidden">
                                    {{-- <img src="{{ asset('storage/' . $item['file_path']) }}"
                                        alt="{{ asset('storage/' . $item['file_path']) }}"> --}}
                                    <img src="{{ asset('storage/images/' . $item['id']) }}"
                                        alt="{{ asset('storage/images/' . $item['id']) }}">
                                </div>

                                <div class="p-6">
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                        {{ $item['title'] }}</h1>
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-600 mb-1">
                                        受け取り場所:
                                        {{ $item['place_1'] }}/{{ $item['place_2'] }}/{{ $item['place_3'] }}
                                    </h2>
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-600 mb-1">
                                        出品者ID:
                                        {{ $item['created_user_id'] }}
                                    </h2>
                                    {{-- <p class="leading-relaxed mb-3">{{ $item['content'] }}</p> --}}
                                    {{-- <div class="text-right flex-wrap mt-4">
                                        <p class="text-red-500 text-xs">申込締め切りまであと○日○時間</p>
                                    </div> --}}
                                </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
            {{-- 登録されている魚一覧 END --}}
        </div>
    </div>
</x-app-layout>
