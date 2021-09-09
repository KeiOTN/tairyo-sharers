<?php
// echo $item['limit'];
// exit();
use Illuminate\Support\Carbon;
$time = Carbon::parse($item['limit'])->format('Y-m-d\TH:i');
// echo $item['content'];
// exit();
?>

<h1>edit</h1>

<p>投稿ID: {{ $item['id'] }}</p>
<form action="{{ route('update') }}" method="post">
    @csrf
    {{-- <input type="hidden" name="id" value="{{ $item['id'] }}"> --}}
    {{-- <textarea name="content" cols="30" rows="10">{{ $item['content'] }}</textarea> --}}




    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">魚の登録内容を編集</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">内容を編集してください</p>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
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
                        <input type="datetime-local" id="limit" name="limit" value="{{ $time }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="cool_now" class="leading-7 text-sm text-gray-600">現在の保冷状態</label>
                        <input type="text" id="cool_now" name="cool_now" value="{{ $item['cool_now'] }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="cool_give" class="leading-7 text-sm text-gray-600">引渡し時の保冷状態</label>
                        <input type="text" id="cool_give" name="cool_give" value="{{ $item['cool_give'] }}"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="content" class="leading-7 text-sm text-gray-600">詳細</label>
                        <textarea id="content" name="content"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $item['content'] }}</textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button
                        class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">送信</button>
                </div>
            </div>
        </div>
    </section>





    {{-- <input type="submit" value="送信"> --}}
</form>
<p>投稿時間: {{ $item['created_at'] }}</p>
