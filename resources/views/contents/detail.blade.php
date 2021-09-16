<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-700 leading-tight">
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

                                        {{-- {{ $owners_judge }} --}}

                                        {{-- 登録者が自分のとき --}}
                                        @if ($item['created_user_id'] == Auth::id())
                                            {{-- これはあなたの投稿です:申し込みはできません --}}
                                            <div class="text-right text-xs">
                                                申し込み締め切り前に募集を締め切りたい場合は<a class="text-blue-500 underline text-sm">こちら</a>
                                            </div>
                                            {{-- 申し込みがまだないとき --}}
                                            @if ($count < 1)
                                                現在、新規申込はありません<br>
                                                現在の申込総数は{{ $count_total }}件です。
                                                {{-- 申し込みがあるとき --}}
                                            @elseif($count >= 1 )
                                                受取りリクエストが{{ $count }}件あります。<br>
                                                回答をお願いします。
                                                @foreach ($pickups as $pickup)
                                                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                                                        <div
                                                            class="h-full flex flex-col items-center border-gray-200 border p-4 rounded-lg bg-white">
                                                            <div class="w-full flex flex-row">
                                                                <svg fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" class="mr-4 w-10 h-10"
                                                                    viewBox="0 0 24 24"
                                                                    onClick="location.href='{{ route('profile', ['id' => $pickup->users_id]) }}'">
                                                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                                                                    </path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <div class="flex-grow w-9/10">
                                                                    <h2 class="text-gray-900 title-font font-medium">
                                                                        {{ $pickup->name }}さんから受け取り希望が届いています
                                                                    </h2>
                                                                    <p class="text-gray-500 text-xs">受け取り希望場所:
                                                                        @if ($pickup->pickup <= 3)
                                                                            <?php $num_key1 = 'place_' . $pickup->pickup; ?>
                                                                            {{ $pickup->$num_key1 }}
                                                                        @elseif($pickup->pickup=4)
                                                                            {{ $pickup->pickup_detail }}
                                                                        @endif
                                                                    </p>
                                                                    <p class="text-gray-500 text-xs">受け取り希望時間:
                                                                        @if ($pickup->pickup <= 3)
                                                                            <?php $num_key2 = 'datetime_' . $pickup->pickup; ?>
                                                                            {{ $pickup->$num_key2 }}
                                                                        @elseif($pickup->pickup=4)
                                                                            要相談
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-row text-center">

                                                                <form action="{{ route('result_save') }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    {{-- id --}}
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $pickup->pickups_id }}">
                                                                    {{-- 回答済み --}}
                                                                    <input type="hidden" name="is_answered" value="1">
                                                                    {{-- getに渡す値 --}}
                                                                    <input type='hidden' name='content_id'
                                                                        value='{{ $pickup->fish_id }}'>
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
                                                            <div class="flex justify-center">
                                                                <?php $pickup_id = $pickup->pickups_id; ?>
                                                                <div onClick="location.href='{{ route('each_request', ['pickup_id' => $pickup_id]) }}'"
                                                                    class="m-2 
                                            flex mx-auto text-white bg-blue-400 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-xs">
                                                                    詳細をみる</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                    </div>
                                    @endif
                                    @endif


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
                                                        <input class="rounded border-gray-300 text-red-400 shadow-sm"
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
                                                        <input class="rounded border-gray-300 text-red-400 shadow-sm"
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
                                                            <label for="scales" class="text-sm">血わた処理済</label>
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
                                        <div onClick="location.href='{{ route('profile', ['id' => $created_user_data['id']]) }}'"
                                            class="sm:w-1/3 text-center sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t border-b sm:border-b-0 m-4">
                                            {{-- {{ $item['created_user_id'] }} --}}
                                            <h2
                                                class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 text-left pl-4 mt-4">
                                                出品者</h2>


                                            @if ($created_user_data['file_path'] == '')
                                                <div
                                                    class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                                        viewBox="0 0 24 24">
                                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </div>

                                            @else
                                                <div
                                                    class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                                    <img src="{{ asset('storage/users/' . $created_user_data['id']) }}"
                                                        alt="{{ asset('storage/users/' . $created_user_data['id']) }}">
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


                                    @if ($created_user_data['id'] !== Auth::id())
                                        {{-- これはあなたの投稿ではありません:申し込みできます --}}

                                        {{-- 申し込みがまだないとき --}}
                                        @if ($count_total < 1)
                                            <h2
                                                class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 text-left pl-4 my-4">
                                                現在の申込状況</h2>
                                            申し込みはまだありません
                                            {{-- 申し込みがあるとき --}}
                                        @elseif($count_total >= 1 )
                                            <h2
                                                class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 text-left pl-4 my-4">
                                                現在の申込状況</h2>
                                            受取りリクエストが{{ $count_total }}件入っています
                                        @endif

                                        <button
                                            onClick="location.href='{{ route('pickup_request', ['content_id' => $item['id']]) }}'"
                                            class="
                                            flex mx-auto my-4 text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-sm">この魚の受け取りを希望する
                                        </button>
                                        <p class="leading-relaxed text-lg mb-4 text-red-500 text-center"> <span
                                                class="tracking-widest text-xs title-font font-medium text-red-500 mb-1 text-right">申込期限:
                                            </span>{{ $item['limit'] }}</p>
                                    @endif
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
