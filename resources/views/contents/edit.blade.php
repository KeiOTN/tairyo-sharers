{{-- <?php
var_dump($item);
exit();
?> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-700 leading-tight">
            {{ __('プロフィール編集') }}
        </h2>
    </x-slot>

    {{-- <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 bg-white">

            <form action="{{ route('update') }}" method="post">
                @csrf
                {{-- <input type="hidden" name="id" value="{{ $item['id'] }}"> --}}
                {{-- <textarea name="content" cols="30" rows="10">{{ $item['content'] }}</textarea> --}}




                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto">
                        {{-- <div class="flex flex-col text-center w-full mb-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">魚の登録内容を編集</h1>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">内容を編集してください</p>
                        </div> --}}
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">


                            {{-- 登録されていた画像を表示 --}}
                            <div>現在登録されている画像</div>
                            @if ($item['file_path'] == null)
                                <p class="text-xs">画像が登録されていません</p>
                                <div
                                    class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                    {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                        viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> --}}
                                    <img src="{{ asset('image/noimage.png') }}" alt="NO IMAGE">
                                </div>

                            @else
                                <div class="w-40 h-40 rounded-full object-contain">
                                    現在の画像を表示
                                    {{-- <img src="{{ asset('storage/' . $user_data['file_path']) }}"
                                        alt="{{ asset('storage/' . $user_data['file_path']) }}"> --}}
                                </div>
                            @endif

                            {{-- 新しい画像をアップロード --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                    {{-- <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span> --}}
                                    <label for="" class="leading-7 text-sm text-gray-600">新しく登録する画像を選択</label>
                                    <input type="file" id="file" name="file"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>







                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                    <input type="text" id="title" name="title" value="{{ $item['title'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="place_1" class="leading-7 text-sm text-gray-600">引渡し場所①</label>
                                    <input type="text" id="place_1" name="place_1" value="{{ $item['place_1'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="place_2" class="leading-7 text-sm text-gray-600">引渡し場所②</label>
                                    <input type="text" id="place_2" name="place_2" value="{{ $item['place_2'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="place_3" class="leading-7 text-sm text-gray-600">引渡し場所③</label>
                                    <input type="text" id="place_3" name="place_3" value="{{ $item['place_3'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="limit" class="leading-7 text-sm text-gray-600">申込期限</label>
                                    <input type="datetime-local" id="limit" name="limit" value="{{ $item['limit'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                            {{-- <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="cool_now" class="leading-7 text-sm text-gray-600">現在の保冷状態</label>
                                    <input type="text" id="cool_now" name="cool_now" value="{{ $item['cool_now'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="cool_give" class="leading-7 text-sm text-gray-600">引渡し時の保冷状態</label>
                                    <input type="text" id="cool_give" name="cool_give"
                                        value="{{ $item['cool_give'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div> --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="content" class="leading-7 text-sm text-gray-600">詳細</label>
                                    <textarea id="content" name="content"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $item['content'] }}</textarea>
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <button
                                    class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">編集内容を登録</button>
                            </div>
                        </div>
                    </div>
                </section>





                {{-- <input type="submit" value="送信"> --}}
            </form>



        </div>
    </div>
</x-app-layout>



{{-- <h1>edit</h1>

<p>投稿ID: {{ $item['id'] }}</p>

<p>投稿時間: {{ $item['created_at'] }}</p> --}}
