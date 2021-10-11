{{-- <?php
echo '<pre>';
var_dump($new_requests);
echo '<pre>';
exit();
?> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お知らせ') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">


                {{-- 受け取りリクエストがきたよ！という通知 --}}
                @foreach ($new_requests as $new_request)
                    {{-- <form action="{{ route('readtime_save_way4') }}" method="post"> --}}
                    {{-- @csrf --}}
                    {{-- <input type="hidden" name="id" value="{{ $result_reply->content_id }}"> --}}
                    {{-- <input type="hidden" name="pickup_id" value="{{ $result_reply->pickup_id }}"> --}}
                    <button class="p-2 w-full"
                        onClick="location.href='{{ route('each_request', ['pickup_id' => $new_request->pickup_id]) }}'">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">


                            <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium text-left">
                                    "{{ $new_request->title }}" へ{{ $new_request->name }}さんから受け取りリクエストが届いています
                                </h2>
                                <p class="text-xs text-left">
                                    @if ($new_request->pickup <= 3)
                                        <?php $num_key1 = 'datetime_' . $new_request->pickup; ?>
                                        <?php $num_key2 = 'place_' . $new_request->pickup; ?>
                                        {{ $new_request->$num_key1 }}/ {{ $new_request->$num_key2 }}
                                    @elseif($new_request->pickup=4)
                                        {{ $new_request->pickup_detail }}
                                    @endif
                                </p>
                                <p class="text-red-600 text-xs text-left">内容を確認してリクエストの承認/拒否を選択してください</p>
                            </div>
                        </div>
                    </button>
                    {{-- </form> --}}
                @endforeach

                {{-- 欲しい！と希望した人への結果が出たよ通知 --}}
                @foreach ($result_replys as $result_reply)
                    <form action="{{ route('readtime_save_way3') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $result_reply->content_id }}">
                        <input type="hidden" name="pickup_id" value="{{ $result_reply->pickup_id }}">
                        <button class="p-2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">


                                @if ($result_reply->result == 1)
                                    {{-- 成立 --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium text-left">
                                            {{-- 魚ID:{{ $result_reply->content_id }} --}}
                                            "{{ $result_reply->title }}" への申込が成立しました
                                        </h2>
                                        <p class="text-red-600 text-xs text-left">
                                            @if ($result_reply->pickup <= 3)
                                                <?php $num_key1 = 'datetime_' . $result_reply->pickup; ?>
                                                <?php $num_key2 = 'place_' . $result_reply->pickup; ?>
                                                {{ $result_reply->$num_key1 }}/ {{ $result_reply->$num_key2 }}
                                            @elseif($result_reply->pickup=4)
                                                {{ $result_reply->pickup_detail }}
                                            @endif
                                        </p>
                                        <p class="text-gray-900 text-xs text-left">至急内容を確認して魚を受け取ってください！</p>
                                    </div>

                                @elseif($result_reply->result == 2)
                                    {{-- 不成立 --}}
                                    <svg class="h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium text-left">
                                            {{-- 魚ID:{{ $result_reply->content_id }} --}}
                                            "{{ $result_reply->title }}" への申込は不成立となりました
                                        </h2>
                                        <p class="text-gray-900 text-xs text-left">またの機会に期待！</p>
                                    </div>
                                @else
                                @endif
                            </div>
                        </button>
                    </form>
                @endforeach

                {{-- リクエストへの新着返信 --}}
                @foreach ($own_requests as $own_request)
                    <form action="{{ route('readtime_save_way1') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $own_request->messages_id }}">
                        <input type="hidden" name="pickups_id" value="{{ $own_request->pickups_id }}">
                        <button class="p-2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium text-left">
                                        {{ $own_request->from_name }}さんからあなたのリクエストへメッセージが届いています
                                    </h2>
                                    <p class="text-gray-500 text-xs text-left">{{ $own_request->message }}</p>
                                </div>
                            </div>
                        </button>
                    </form>
                @endforeach

                {{-- 出品商品への新着返信 --}}
                @foreach ($own_contents as $own_content)
                    <form action="{{ route('readtime_save_way2') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $own_content->messages_id }}">
                        <input type="hidden" name="pickups_id" value="{{ $own_content->pickups_id }}">
                        <button class="p-2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium text-left">
                                        {{ $own_content->from_name }}さんから{{ $own_content->title }}にメッセージが届いています
                                    </h2>
                                    <p class="text-gray-500 text-xs text-left">{{ $own_content->message }}</p>
                                </div>
                            </div>
                        </button>
                    </form>
                @endforeach


            </div>
        </div>
    </div>
</x-app-layout>
