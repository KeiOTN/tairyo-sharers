<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-700 leading-tight">
            {{ __('登録内容の編集') }}
        </h2>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <style>
            /* 候補2入力 */
            .txt-hide {
                display: none;
            }

            .more {
                width: 160px;
                margin: 2px 0px;
                text-align: center;
                font-size: 0.8em;
                display: block;
                background-color: #666;
                color: #fff;
                /* padding: 10px 0px; */
                border: none;
                outline: 0;
                transition: .5s;
                -erbkit-transition: .5s;
            }

            .more::after {
                content: "+ 候補日時2を追加";
                transition: .2s;
                -erbkit-transition: .2s;
            }

            .more.on-click::after {
                content: "- 候補2を閉じる";
            }

            /* 候補3入力 */
            .txt-hide3 {
                display: none;
            }

            .more3 {
                width: 160px;
                margin: 2px 0px;
                text-align: center;
                font-size: 0.8em;
                display: block;
                background-color: #666;
                color: #fff;
                border: none;
                outline: 0;
                transition: .5s;
                -erbkit-transition: .5s;
            }

            .more3::after {
                content: "+ 候補日時3を追加";
                transition: .2s;
                -erbkit-transition: .2s;
            }

            .more3.on-click::after {
                content: "- 候補3を閉じる";
            }

        </style>
    </x-slot>
    <div>
        <p class="text-xs text-red-600">現在、編集機能は正常に動作しません。</p>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 bg-white">
            <form action="{{ route('update') }}" method="post">
                @csrf
                <section class="text-gray-600 body-font relative bg-white">
                    <div class="container px-5 pt-4 mx-auto">
                        <div class="lg:w-2/3 md:w-2/3 mx-auto border mb-2">
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <span class="text-white bg-red-400 border-0 py-1 px-2 rounded text-sm">必須</span>
                            <div class="p-2 w-full">
                                {{-- <input type="hidden" name="created_user_id" value="{{ Auth::id() }}"> --}}

                                <div class="leading-7 text-sm text-gray-600">現在登録されている画像</div>
                                @if (!isset($item['file_name']))
                                    <p class="text-xs">画像が登録されていません</p>
                                    <div
                                        class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400 border">
                                        <img src="{{ asset('image/no_image.png') }}" alt="NO IMAGE">
                                    </div>
                                @else
                                    <div class="w-40 h-40 object-contain border">
                                        {{-- 現在の画像を表示 --}}
                                        <img src="{{ asset('storage/images/' . $item['id']) }}"
                                            alt="{{ asset('storage/images/' . $item['id']) }}">
                                    </div>
                                @endif

                                <div class="relative">
                                    <label for="file"
                                        class="leading-7 text-sm text-gray-600">別の画像を登録(登録されるのは1枚です)</label>
                                    <input type="file" id="file" name="file"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                    <input type="text" id="title" name="title" value="{{ $item['title'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="place_1" class="leading-7 text-sm text-gray-600">引渡し希望日時①</label><br>
                                    <span for="place_1" class="text-sm text-gray-800 font-bold">現在の登録内容:
                                        {{ $item['datetime_1'] }}
                                    </span>
                                    <span class="leading-7 text-xs text-gray-600"> 変更しない場合も同じ日時を選択してください</span>
                                    <input type="datetime-local" id="datetime_1" name="datetime_1"
                                        class="w-5/6 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <br>
                                    <label for="place_1" class="leading-7 text-sm text-gray-600">引渡し希望場所①</label>
                                    <br>
                                    <input type="text" id="place_1" name="place_1" value="{{ $item['place_1'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>

                            <div class="more"></div>
                            <div class="p-2 w-full txt-hide">
                                <div class="relative">
                                    {{-- <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span> --}}
                                    <label for="datetime_2" class="leading-7 text-sm text-gray-600">引渡し希望日時②</label>
                                    <span for="place_1" class="text-sm text-gray-800 font-bold">現在の登録内容:
                                        {{ $item['datetime_2'] ? $item['datetime_2'] : 'ありません' }}
                                    </span><br>
                                    <input type="datetime-local" id="datetime_2" name="datetime_2"
                                        class="w-5/6 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <label for="place_2" class="leading-7 text-sm text-gray-600">
                                        <br>引渡し希望場所②</label>
                                    <input type="text" id="place_2" name="place_2"
                                        value="{{ $item['place_2'] ? $item['place_2'] : '登録がありません' }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>

                            <div class="more3"></div>
                            <div class="p-2 w-full txt-hide3">
                                <div class="relative">
                                    <label for="datetime_3" class="leading-7 text-sm text-gray-600">引渡し希望日時③</label>
                                    <span for="place_1" class="text-sm text-gray-800 font-bold">現在の登録内容:
                                        {{ $item['datetime_2'] ? $item['datetime_2'] : 'ありません' }}
                                    </span><br>
                                    <input type="datetime-local" id="datetime_3" name="datetime_3"
                                        class="w-5/6 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <label for="place_3" class="leading-7 text-sm text-gray-600">
                                        <br>引渡し希望場所③</label>
                                    <input type="text" id="place_3" name="place_3"
                                        value="{{ $item['place_3'] ? $item['place_3'] : '登録がありません' }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <p for="place_3" class="leading-7 text-sm text-gray-600 font-bold">
                                        ※引渡し日時/場所が3つ以上ある場合は、詳細欄に記入してください。
                                    </p>
                                </div>
                            </div>


                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="content" class="leading-7 text-sm text-gray-600">詳細</label>
                                    <textarea id="content" name="content"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-sm outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $item['content'] }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="lg:w-2/3 md:w-2/3 mx-auto border my-2">
                            <div class="p-2 w-full flex flex-col">
                                <div class="relative">
                                    <span
                                        class="text-white bg-yellow-500 border-0 py-1 px-2 rounded text-sm">複数選択可</span>
                                    <label for="process" class="leading-7 text-sm text-gray-600"> 締め方/処理</label>
                                    <span class="text-sm text-gray-400">(選択のない場合、初期値で送信されます)</span>

                                </div>
                                {{-- 1段目 --}}
                                <div class="p-2 w-full">
                                    <input
                                        class="rounded border-gray-300 text-gray-400 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                                        type="checkbox" name="process_1" value="1"
                                        {{ $item['process_1'] ? 'checked' : '' }}>
                                    <label for="scales" class="text-sm">締め方不明</label>
                                </div>
                                {{-- 2段目 --}}
                                <div class="p-2 w-full flex flex-row">
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_2" value="1"
                                            {{ $item['process_2'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">活〆</label>
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_3" value="1"
                                            {{ $item['process_3'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">脳天締め</label>
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_4" value="1"
                                            {{ $item['process_4'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">氷締め</label>
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_5" value="1"
                                            {{ $item['process_5'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">神経締め</label>
                                    </div>
                                </div>
                                {{-- 3段目 --}}
                                <div class="p-2 w-full">
                                    <input
                                        class="rounded border-gray-300 text-gray-400 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                                        type="checkbox" name="process_6" value="1"
                                        {{ $item['process_6'] ? 'checked' : '' }}>
                                    <label for="scales" class="text-sm">血抜き/内臓処理未</label>
                                </div>
                                {{-- 4段目 --}}
                                <div class="p-2 w-full flex flex-row">
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_7" value="1"
                                            {{ $item['process_7'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">血抜き済</label>
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_8" value="1"
                                            {{ $item['process_8'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">内臓処理済</label>
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_9" value="1"
                                            {{ $item['process_9'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">血わた処理済</label>
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="process_10" value="1"
                                            {{ $item['process_10'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm">頭落とし済</label>
                                    </div>
                                </div>
                            </div>


                            <div class="p-2 w-full">
                                <div class="relative">
                                    <span class="text-white bg-yellow-500 border-0 py-1 px-2 rounded text-sm">選択</span>
                                    <label for="cool_now" class="leading-7 text-sm text-gray-600">現在の保冷状態</label>
                                    <span class="text-sm text-gray-400">(選択のない場合、初期値で送信されます)</span>
                                    <select id="cool_now" name="cool_now"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="1" selected>クーラーボックスで冷却中</option>
                                        <option value="2">冷蔵庫で冷却中</option>
                                        <option value="3">冷蔵庫(家庭用/チルド室)で冷却中</option>
                                        <option value="4">冷凍庫(家庭用)で冷凍状態</option>
                                        <option value="5">冷蔵庫(家庭用/急速冷凍)で冷凍状態</option>
                                        <option value="6">冷凍庫(業務用)で冷凍状態</option>
                                        <option value="7">冷蔵庫(業務用/急速冷凍)で冷凍状態</option>
                                        <option value="8">生簀で管理中</option>
                                        <option value="9">その他(詳細欄に記載する)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <span class="text-white bg-yellow-500 border-0 py-1 px-2 rounded text-sm">選択</span>
                                    <label for="cool_give" class="leading-7 text-sm text-gray-600">引渡し時の保冷状態</label>
                                    <span class="text-sm text-gray-400">(選択のない場合、初期値で送信されます)</span>
                                    <select id="cool_give" name="cool_give"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <option value="1" selected>クーラーボックスで冷却状態で引渡し場所まで持参します</option>
                                        <option value="2">その他(説明文に記載する)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-blue-500 border-0 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg mb-4">登録</button>
                    </div>
        </div>
        </section>


        </form>
    </div>
    </div>
    <script>
        // 日時2入力
        $(function() {
            $(".more").on("click", function() {
                $(this).toggleClass("on-click");
                $(".txt-hide").slideToggle(300);
            });
        });
        // 日時3入力
        $(function() {
            $(".more3").on("click", function() {
                $(this).toggleClass("on-click");
                $(".txt-hide3").slideToggle(300);
            });
        });
    </script>
</x-app-layout>
