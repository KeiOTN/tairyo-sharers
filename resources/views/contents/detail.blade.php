<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-800 leading-tight">
            {{ __('魚情報 詳細') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font">
                    <div class="py-8">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="container px-5 py-8 mx-auto flex flex-col">

                                    <div class="lg:w-2/3 mx-auto">

                                        <div class="flex justify-center rounded-lg h-70 overflow-hidden border">
                                            @if (isset($item['file_path']))
                                                <img src="{{ asset('storage/images/' . $item['id']) }}"
                                                    alt="{{ asset('storage/images/' . $item['id']) }}">
                                            @endif
                                        </div>
                                        <div class="flex flex-col sm:flex-row ">
                                            <div
                                                class="sm:w-2/3 sm:pl-8 sm:py-8 mt-4 pt-4 sm:mt-0 text-left sm:text-left my-8 ">
                                                <div class="leading-relaxed text-lg mb-4 font-bold">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1ß">
                                                        魚の種類、匹数
                                                    </p>{{ $item['title'] }}
                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1ß">
                                                        1匹の大きさ、重さ(だいたい)
                                                    </p>{{ $item['size'] }}
                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1ß">
                                                        釣った場所(おおまかに)
                                                    </p>{{ $item['fishing_area'] }}
                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        引渡し日時/場所①
                                                    </p>
                                                    <p>{{ $item['datetime_1'] }}</p>
                                                    <p>{{ $item['place_1'] }}</p>
                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        引渡し日時/場所②
                                                    </p>
                                                    <p>{{ $item['datetime_2'] }}</p>
                                                    <p>{{ $item['place_2'] }}</p>
                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        引渡し日時/場所③
                                                    </p>
                                                    <p>{{ $item['datetime_3'] }}</p>
                                                    <p>{{ $item['place_3'] }}</p>
                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        締めかた/処理
                                                    </p>
                                                    <div class="p-2 w-full flex flex-col">
                                                        {{-- 1段目 --}}
                                                        <div class="p-2 w-full">
                                                            <input
                                                                class="rounded border-gray-300 text-red-400 shadow-sm"
                                                                type="checkbox" name="process_1" value="1"
                                                                {{ $item['process_1'] ? 'checked' : '' }}
                                                                onclick="return false;">
                                                            <label for="scales" class="text-sm">締め方不明</label>
                                                        </div>
                                                        {{-- 2段目 --}}
                                                        <div class="p-2 w-full flex flex-row">
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_2" value="1"
                                                                    {{ $item['process_2'] ? 'checked' : '' }}
                                                                    onclick="return false;">
                                                                <label for="scales" class="text-sm">活〆</label>
                                                            </div>
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_3" value="1"
                                                                    {{ $item['process_3'] ? 'checked' : '' }}
                                                                    onclick="return false;">

                                                                <label for="scales" class="text-sm">脳天締め</label>
                                                            </div>
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_4" value="1"
                                                                    {{ $item['process_4'] ? 'checked' : '' }}
                                                                    onclick="return false;">
                                                                <label for="scales" class="text-sm">氷締め</label>
                                                            </div>
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_5" value="1"
                                                                    {{ $item['process_5'] ? 'checked' : '' }}
                                                                    onclick="return false;">
                                                                <label for="scales" class="text-sm">神経締め</label>
                                                            </div>
                                                        </div>
                                                        {{-- 3段目 --}}
                                                        <div class="p-2 w-full">
                                                            <input
                                                                class="rounded border-gray-300 text-red-400 shadow-sm"
                                                                type="checkbox" name="process_6" value="1"
                                                                {{ $item['process_6'] ? 'checked' : '' }}
                                                                onclick="return false;">
                                                            <label for="scales" class="text-sm">血抜き/内臓処理未</label>
                                                        </div>
                                                        {{-- 4段目 --}}
                                                        <div class="p-2 w-full flex flex-row">
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_7" value="1"
                                                                    {{ $item['process_7'] ? 'checked' : '' }}
                                                                    onclick="return false;">
                                                                <label for="scales" class="text-sm">血抜き済</label>
                                                            </div>
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_8" value="1"
                                                                    {{ $item['process_8'] ? 'checked' : '' }}
                                                                    onclick="return false;">
                                                                <label for="scales" class="text-sm">内臓処理済</label>
                                                            </div>
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_9" value="1"
                                                                    {{ $item['process_9'] ? 'checked' : '' }}
                                                                    onclick="return false;">
                                                                <label for="scales"
                                                                    class="text-sm">血わた処理済</label>
                                                            </div>
                                                            <div class="w-1/4">
                                                                <input
                                                                    class="rounded border-gray-300 text-blue-600 shadow-sm"
                                                                    type="checkbox" name="process_10" value="1"
                                                                    {{ $item['process_10'] ? 'checked' : '' }}
                                                                    onclick="return false;">
                                                                <label for="scales" class="text-sm">頭落とし済</label>
                                                            </div>
                                                        </div>
                                                    </div>





                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        現在の保冷状況
                                                    </p>
                                                    {{ config('const.Cool_Now.' . $item['cool_now']) }}
                                                </div>
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        引渡し時の保冷状況
                                                    </p>
                                                    {{ config('const.Cool_Give.' . $item['cool_give']) }}
                                                </div>
                                                {{-- <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        着払い発送
                                                    </p>{{ config('const.Send_Or_Not.' . $item['send_or_not']) }}

                                                </div> --}}
                                                <div class="leading-relaxed text-lg mb-4">
                                                    <p
                                                        class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                                        詳細
                                                    </p>{{ $item['content'] }}
                                                </div>
                                                <h2
                                                    class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 text-right mr-4">
                                                    魚ID:
                                                    {{ $item['id'] }}</h2>
                                                <h2
                                                    class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 text-right mr-4">
                                                    投稿された時間:{{ $item['created_at'] }}
                                                </h2>
                                            </div>
                                            <div
                                                class="sm:w-1/3 text-center sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t border-b sm:border-b-0 m-4">
                                                {{-- {{ $item['created_user_id'] }} --}}
                                                <h2
                                                    class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 text-left pl-4 mt-4">
                                                    出品者</h2>


                                                @if (isset($created_user_data['file_path']))
                                                    <div
                                                        class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                                        <img src="{{ asset('storage/users/' . $created_user_data['id']) }}"
                                                            alt="{{ asset('storage/users/' . $created_user_data['id']) }}">
                                                    </div>
                                                @else
                                                    <div
                                                        class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-10 h-10" viewBox="0 0 24 24">
                                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </div>
                                                @endif

                                                <div class="flex flex-col items-center text-center justify-center my-4">
                                                    <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">
                                                        {{ $created_user_data['name'] }}
                                                    </h2>
                                                    <div class="w-12 h-1 bg-blue-500 rounded mt-2 mb-4 "></div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2
                                            class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 text-left pl-4 my-4">
                                            現在の申込状況</h2>
                                        {{-- 申し込みがまだないとき --}}
                                        <div class="flex justify-center flex-col">
                                            <p>-- 申し込みがないとき --</p>
                                            <h1
                                                class="text-center font-medium title-font text-gray-400 text-lg font-bold mx-8 my-4">
                                                まだありません
                                            </h1>
                                        </div>
                                        {{-- 申し込みがあるとき --}}
                                        <div class="flex justify-center flex-col">
                                            <p>-- 申し込みがあるとき --</p>
                                            <h1
                                                class="text-center font-medium title-font text-gray-400 text-lg font-bold mx-8 my-4">
                                                ◯件の申し込みがあります

                                            </h1>
                                        </div>
                                        {{-- 登録者が自分のとき --}}
                                        <div class="flex justify-center flex-col">
                                            <p>-- 登録者が自分のとき --</p>
                                            <h1
                                                class="text-center font-medium title-font text-gray-400 text-lg font-bold mx-8 my-4">
                                                申し込みの詳細情報を表示<br>かつ、申込ボタンを非表示<br>かつ、出品者情報を非表示
                                            </h1>
                                        </div>

                                        {{-- 既に申し込んでいる場合もボタンは押せる --}}
                                        <button
                                            onClick="location.href='{{ route('pickup_request', ['content_id' => $item['id']]) }}'"
                                            class="
                                            flex mx-auto my-4 text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-sm">この魚の受け取りを希望する
                                        </button>
                                        <p class="leading-relaxed text-lg mb-4 text-red-500 text-center"> <span
                                                class="tracking-widest text-xs title-font font-medium text-red-500 mb-1 text-right">申込期限:
                                            </span>{{ $item['limit'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
