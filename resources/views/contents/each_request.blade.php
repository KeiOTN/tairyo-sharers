<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-700 leading-tight">
            {{ __('取引ナビ(取引状況を表示) ') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                <div class="h-full flex flex-col items-center border-gray-200 border p-4 rounded-lg bg-white">
                    <div class="w-full flex flex-row">
                        {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="mr-4 w-10 h-10" viewBox="0 0 24 24"
                            onClick="location.href='{{ route('profile', ['id' => $pickup->pickup_user_id]) }}'">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                            </path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg> --}}
                        <div class="flex-grow w-9/10">
                            <h2 class="text-gray-900 title-font font-medium">
                                {{ $pickup_user->name }}さんから受け取り希望が届いています
                            </h2>
                            <p class="text-gray-500 text-xs">受け取り希望場所:
                                @if ($pickup->pickup <= 3)
                                    <?php $num_key1 = 'place_' . $pickup->pickup; ?>
                                    {{ $content->$num_key1 }}
                                @elseif($pickup->pickup=4)
                                    {{ $content->pickup_detail }}
                                @endif
                            </p>
                            <p class="text-gray-500 text-xs">受け取り希望時間:
                                @if ($pickup->pickup <= 3)
                                    <?php $num_key2 = 'datetime_' . $pickup->pickup; ?>
                                    {{ $content->$num_key2 }}
                                @elseif($pickup->pickup=4)
                                    要相談
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-row text-center">

                        <form action="{{ route('result_save') }}" method="POST">
                            @method('put')
                            @csrf
                            {{-- id --}}
                            <input type="hidden" name="id" value="{{ $pickup->id }}">
                            {{-- 回答済み --}}
                            <input type="hidden" name="is_answered" value="1">
                            {{-- getに渡す値 --}}
                            <input type='hidden' name='content_id' value='{{ $pickup->fish_id }}'>
                            <div class="flex flex-row text-center">
                                <button type="submit" name="result" value="1"
                                    class="w-full m-2 px-4 
                                            text-white bg-yellow-500 border-0 py-2 focus:outline-none hover:bg-yello-600 rounded text-xs">
                                    この人にあげる！
                                </button>
                                <button type="submit" name="result" value="2"
                                    class="w-full m-2 px-4
                                            text-white bg-red-500 border-0 py-2 focus:outline-none hover:bg-red-600 rounded text-xs">
                                    お断りする
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="h-full flex flex-col border-gray-200 border p-4 rounded-lg bg-white m-2"
                onClick="location.href='{{ route('profile', ['id' => $pickup->pickup_user_id]) }}'">
                <p class="text-gray-500 text-xs"> 受取希望者情報</p>
                <div class="flex flex-row text-gray-500 items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="mr-4 w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                        </path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <h2 class="text-gray-900 title-font font-medium">
                        {{ $pickup_user->name }} <span class="text-gray-500 text-xs">(取引回数を表示)</span>
                    </h2>
                </div>
            </div>

            <div class="h-full flex flex-col border-gray-200 border p-4 rounded-lg bg-white mx-2">
                <p class="text-gray-500 text-xs"> 魚の情報</p>
                <div class="px-4 py-2 md:w-1/4"
                    onClick="location.href='{{ route('detail', ['content_id' => $content['id']]) }}'">
                    <div
                        class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-sm">
                        {{-- @if (isset($item['file_path'])) --}}
                        <div class="block relative h-28 rounded overflow-hidden">
                            <img src="{{ asset('storage/images/' . $content['id']) }}"
                                alt="{{ asset('storage/images/' . $content['id']) }}">
                        </div>
                        <div class="p-6">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                {{ $content['title'] }}</h1>
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-900 mb-1">
                                受け取り場所:
                                {{ $content['datetime_1'] }}{{ $content['place_1'] }}/{{ $content['datetime_2'] }}{{ $content['place_2'] }}/{{ $content['datetime_3'] }}{{ $content['place_3'] }}
                            </h2>
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-900 mb-1">
                                詳細:
                                {{ $content['content'] }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>



            <div class="h-full flex flex-col border-gray-200 border p-4 rounded-lg bg-white m-2">
                <p class="text-gray-500 text-xs"> メッセージを送る</p>
                <form action="{{ route('message_save') }}" method="post">
                    @csrf

                    <textarea id="message" name="message" placeholder="メッセージを記入"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-sm outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    <button
                        class="flex mx-auto mb-2 text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-sm">送信</button>
                </form>

                <div class="
                        bg-gray-100 rounded flex px-4 py-2 h-full justify-start">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="3" class="text-gray-500 w-4 h-4 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                        </path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <p class="text-xs">{{ $pickup_user->name }}</p>
                </div>
                <div class="w-full p-4 h-full border text-xs mb-2">
                    <p class="text-sm"> sample message from client</p>
                    <p class="text-gray-400">送信日時: YYYY/MM/DD YYYY/MM/DD HH/mm</p>
                </div>

                <div class="bg-gray-100 rounded flex px-4 py-2 h-full justify-end">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="3" class="text-gray-500 w-4 h-4 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                        </path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <p class="text-xs">{{ $auth_user->name }}</p>
                </div>
                <div class="w-full p-4 h-full border text-xs mb-2">
                    <p class="text-sm">sample message from auther</p>
                    <p class="text-gray-400">送信日時: YYYY/MM/DD YYYY/MM/DD HH/mm</p>
                </div>

                <div class="
                        bg-gray-100 rounded flex px-4 py-2 h-full justify-start">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="3" class="text-gray-500 w-4 h-4 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                        </path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <p class="text-xs">{{ $pickup_user->name }}</p>
                </div>
                <div class="w-full p-4 h-full border text-xs mb-2">
                    <p class="text-sm"> sample message from client</p>
                    <p class="text-gray-400">送信日時: YYYY/MM/DD YYYY/MM/DD HH/mm</p>
                </div>
            </div>




        </div>
    </div>
</x-app-layout>
