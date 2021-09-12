<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="h-25 m-4" onClick="location.href='{{ route('start_guide') }}'">
        <img src="{{ asset('image/start-guide.png') }}" alt="出品ガイド">
        <p class="lg:w-2/3 mx-auto leading-relaxed text-sm text-center text-gray-900">↑魚の登録方法はこちらをcheck!</p>
    </div>

    <form action="{{ route('save') }}" method="post" enctype="multipart/form-data">
        @csrf

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-12 mx-auto">
                <div class="flex flex-col w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900 text-center">- - - 魚を登録 - -
                        -</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-sm text-center">
                        シェアしたい魚の情報を入力してください。<br>たくさんある場合もまとめて１つの登録にして結構です。<br>詳細欄に、どのように配分したいかを記入してください。
                    </p>
                </div>
                {{-- 魚を登録したユーザーID --}}
                <input type="hidden" name="created_user_id" value="{{ Auth::id() }}">

                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-red-400 border-0 py-1 px-2 rounded text-sm">必須</span>
                            <label for="file" class="leading-7 text-sm text-gray-600">画像を選択</label>
                            <input type="file" id="file" name="file"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-red-400 border-0 py-1 px-2 rounded text-sm">必須</span>
                            <label for="title" class="leading-7 text-sm text-gray-600">魚の種類、匹数</label>
                            <input type="text" id="title" name="title" placeholder="例) 真鯛、蓮子鯛 計10匹"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span>
                            <label for="size" class="leading-7 text-sm text-gray-600">1匹の大きさ、重さ(だいたい)</label>
                            <input type="text" id="size" name="size" placeholder="例) 真鯛20-30cm,蓮子鯛15-25cm位"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span>
                            <label for="fishing_area" class="leading-7 text-sm text-gray-600">釣った場所(おおまかに)</label>
                            <input type="text" id="fishing_area" name="fishing_area" placeholder="例) 玄界灘"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    @error('file')
                        {{ $message }}
                        <br>
                    @enderror
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-red-400 border-0 py-1 px-2 rounded text-sm">必須</span>
                            <label for="place_1" class="leading-7 text-sm text-gray-600">引渡し日時/場所①</label>
                            <input type="datetime-local" id="datetime_1" name="datetime_1"
                                class="w-5/6 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <input type="text" id="place_1" name="place_1" placeholder="例) ◯◯市/◯◯漁港"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span>
                            <label for="place_2" class="leading-7 text-sm text-gray-600">引渡し日時/場所②</label>
                            <input type="datetime-local" id="datetime_2" name="datetime_2"
                                class="w-5/6 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <input type="text" id="place_2" name="place_2" placeholder="例) ◯◯市/◯◯駅周辺"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span>
                            <label for="place_3" class="leading-7 text-sm text-gray-600">引渡し日時/場所③</label>
                            <input type="datetime-local" id="datetime_3" name="datetime_3"
                                class="w-5/6 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <input type="text" id="place_3" name="place_3" placeholder="例) ◯◯市/◯◯釣具店周辺"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <p for="place_3" class="leading-7 text-sm text-gray-600">※引渡し日時/場所が3つ以上ある場合は、詳細欄に記入してください。
                            </p>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-red-400 border-0 py-1 px-2 rounded text-sm">必須</span>
                            <label for="limit" class="leading-7 text-sm text-gray-600">申込期限</label>
                            <input type="datetime-local" id="limit" name="limit"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>

                    <div class="p-2 w-full flex flex-col">
                        <div class="relative">
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">複数選択可</span>
                            <label for="process" class="leading-7 text-sm text-gray-600"> 締め方/処理</label>

                        </div>
                        {{-- 1段目 --}}
                        <div class="p-2 w-full">
                            <input
                                class="rounded border-gray-300 text-red-400 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                type="checkbox" name="process_1" value="1" checked>
                            <label for="scales" class="text-sm">締め方不明</label>
                        </div>
                        {{-- 2段目 --}}
                        <div class="p-2 w-full flex flex-row">
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_2" value="1">
                                <label for="scales" class="text-sm">活〆</label>
                            </div>
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_3" value="1">
                                <label for="scales" class="text-sm">脳天締め</label>
                            </div>
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_4" value="1">
                                <label for="scales" class="text-sm">氷締め</label>
                            </div>
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_5" value="1">
                                <label for="scales" class="text-sm">神経締め</label>
                            </div>
                        </div>
                        {{-- 3段目 --}}
                        <div class="p-2 w-full">
                            <input
                                class="rounded border-gray-300 text-red-400 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                type="checkbox" name="process_6" value="1" checked>
                            <label for="scales" class="text-sm">血抜き/内臓処理未</label>
                        </div>
                        {{-- 4段目 --}}
                        <div class="p-2 w-full flex flex-row">
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_7" value="1">
                                <label for="scales" class="text-sm">血抜き済</label>
                            </div>
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_8" value="1">
                                <label for="scales" class="text-sm">内臓処理済</label>
                            </div>
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_9" value="1">
                                <label for="scales" class="text-sm">血わた処理済</label>
                            </div>
                            <div class="w-1/4">
                                <input
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    type="checkbox" name="process_10" value="1">
                                <label for="scales" class="text-sm">頭落とし済</label>
                            </div>
                        </div>
                    </div>


                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">選択</span>
                            <label for="cool_now" class="leading-7 text-sm text-gray-600">現在の保冷状態</label>
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
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">選択</span>
                            <label for="cool_give" class="leading-7 text-sm text-gray-600">引渡し時の保冷状態</label>
                            <select id="cool_give" name="cool_give"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="1" selected>クーラーボックスで冷却状態で引渡し場所まで持参します</option>
                                <option value="2">その他(説明文に記載する)</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="p-2 w-full flex flex-row">
                        <div class="w-1/3"><span
                                class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">選択</span>

                            <label for="send-or-not" class="leading-7 text-sm text-gray-600">着払い発送</label>
                        </div>
                        <div class="w-1/3 pl-4"><input
                                class="focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200"
                                type="radio" name="send_or_not" value="1" checked="checked">
                            NG</div>
                        <div class="w-1/3"> <input
                                class="focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200"
                                type="radio" name="send_or_not" value="2"> OK</div>
                    </div> --}}
                    <div class="p-2 w-full">
                        <div class="relative">
                            <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span>
                            <label for="content" class="leading-7 text-sm text-gray-600">詳細</label>
                            <textarea id="content" name="content"
                                placeholder="内容の例) どのような配分を考えているか(最大◯人、一人○匹等)。上記以外の受け渡し場所がある場合。締め方や管理方法に注釈がある場合。上記の内容に不足する情報を記入しましょう"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-sm outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button
                            class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">登録</button>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
