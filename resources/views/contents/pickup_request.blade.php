<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-800 leading-tight">
            {{ __('魚の受け取りを希望する') }}
        </h2>
    </x-slot>
    <form action="{{ route('pickup_request_save') }}" method="post">
        @csrf

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                        <div class="py-8">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="container px-5 py-8 mx-auto flex flex-col">

                                        <div class="lg:w-2/3 mx-auto">
                                            {{-- 魚ID --}}
                                            <input type="hidden" name="fish_id" value="{{ $item['id'] }}">
                                            {{-- 受け取りリクエストしたユーザーID --}}
                                            <input type="hidden" name="pickup_user_id" value="{{ Auth::id() }}">
                                            <div class="flex justify-center rounded-lg h-40 overflow-hidden border">
                                                @if (isset($item['file_path']))
                                                    <img src="{{ asset('storage/images/' . $item['id']) }}"
                                                        alt="{{ asset('storage/images/' . $item['id']) }}">
                                                @else
                                                    <img src="{{ asset('image/no_image.png') }}"
                                                        alt="{{ asset('image/no_image.png') }}">
                                                @endif
                                            </div>
                                            <div class="flex flex-col sm:flex-row">
                                                <div
                                                    class="sm:w-2/3 sm:pl-8 sm:py-8 mt-4 pt-4 sm:mt-0 text-left sm:text-left my-8 ">
                                                    <div class="leading-relaxed text-lg mb-4 font-bold">
                                                        <p
                                                            class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1ß">
                                                            魚の種類、匹数
                                                        </p>{{ $item['title'] }}
                                                    </div>
                                                    <div class="w-full mb-4">
                                                        <p class="text-red-500 text-xs mb-4">受け取り希望日時を以下より<span
                                                                class="text-red-500 text-xs font-bold">ひとつ</span>選択してください。
                                                        </p>
                                                        <div class="w-full flex flex-row">
                                                            <div class="w-1/10 ml-4 mr-1">
                                                                <input
                                                                    class="focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200"
                                                                    type="radio" name="pickup" value="1">
                                                            </div>
                                                            <div class="leading-relaxed text-lg mb-4 w-9/10">
                                                                <p>{{ $item['datetime_1'] }}</p>
                                                                <p>{{ $item['place_1'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="w-full flex flex-row">

                                                            @if ($item['datetime_2'] == null)
                                                                {{-- radioボタン表示しない --}}
                                                            @else
                                                                <div class="w-1/10 ml-4 mr-1">
                                                                    <input
                                                                        class="focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200"
                                                                        type="radio" name="pickup" value="2">
                                                                </div>
                                                            @endif
                                                            <div class="leading-relaxed text-lg mb-4 w-9/10">
                                                                <p>{{ $item['datetime_2'] }}</p>
                                                                <p>{{ $item['place_2'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="w-full flex flex-row">
                                                            @if ($item['datetime_3'] == null)
                                                                {{-- radioボタン表示しない --}}
                                                            @else
                                                                <div class="w-1/10 ml-4 mr-1">
                                                                    <input
                                                                        class="focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200"
                                                                        type="radio" name="pickup" value="2">
                                                                </div>
                                                            @endif
                                                            <div class="leading-relaxed text-lg mb-4 w-9/10">
                                                                <p>{{ $item['datetime_3'] }}</p>
                                                                <p>{{ $item['place_3'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="w-full flex flex-row">
                                                            <div class="w-1/10 ml-4 mr-1">
                                                                <input
                                                                    class="focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200"
                                                                    type="radio" name="pickup" value="4">
                                                            </div>
                                                            <div class="leading-relaxed text-lg mb-4 w-9/10">
                                                                <p>その他の受け取り条件を希望する</p>
                                                            </div>
                                                        </div>
                                                        <textarea id="pickup_else" name="pickup_detail"
                                                            placeholder="希望内容を記入してください。"
                                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-sm outline-none text-gray-700 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>

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


                                            </div>
                                            <button
                                                class="
                                            flex mx-auto my-4 text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-sm">受け取り希望を送信する
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
