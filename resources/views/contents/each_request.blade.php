{{-- <?php
echo '<pre>';
var_dump($pickup->is_answered);
echo '<pre>';
exit();

?> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-700 leading-tight">
            {{ __('取引ナビ(取引状況を表示) ') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- 出品者の場合 --}}
            @if ($created_user->id == Auth::id())

                <div class="p-2 w-full">

                    {{-- リクエストに未回答 --}}
                    @if ($pickup->is_answered !== '1')

                        <div
                            class="h-full flex flex-col md:flex-row items-center border-gray-200 border p-4 rounded-lg bg-white">
                            <div class="w-full md:w-1/2 flex flex-row">
                                {{-- <svg fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" class="mr-4 w-10 h-10"
                                                                    viewBox="0 0 24 24"
                                                                    onClick="location.href='{{ route('profile', ['id' => $pickup->users_id]) }}'">
                                                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                                                                    </path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg> --}}
                                <div class="flex-row w-9/10">
                                    <h2 class="text-gray-900 title-font font-medium">
                                        {{ $pickup_user->name }}さんから受け取り希望が届いています
                                    </h2>
                                    <p class="text-gray-500 text-xs">受け取り希望場所:
                                        @if ($pickup->pickup <= 3)
                                            <?php $num_key1 = 'place_' . $pickup->pickup; ?>
                                            {{ $content->$num_key1 }}
                                        @elseif($pickup->pickup=4)
                                            {{ $pickup->pickup_detail }}
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
                            <div class="w-full flex flex-row text-center justify-around items-center">

                                <form action="{{ route('result_save') }}" method="POST">
                                    @method('put')
                                    @csrf
                                    {{-- id --}}
                                    <input type="hidden" name="id" value="{{ $pickup->id }}">
                                    {{-- 回答済み --}}
                                    <input type="hidden" name="is_answered" value="1">
                                    {{-- getに渡す値 --}}
                                    <input type='hidden' name='content_id' value='{{ $pickup->fish_id }}'>
                                    <div class="w-full flex flex-row text-center  justify-around items-center">
                                        <button type="submit" name="result" value="1"
                                            class="w-32 m-2 px-4 
                                            text-white bg-yellow-500 border-0 py-2 focus:outline-none hover:bg-yello-600 rounded text-xs">
                                            この人にあげる！
                                        </button>
                                        <button type="submit" name="result" value="2"
                                            class="w-32 m-2 px-4
                                            text-white bg-red-500 border-0 py-2 focus:outline-none hover:bg-red-600 rounded text-xs">
                                            お断りする
                                        </button>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="flex justify-center md:w-1/3">
                                                              
                                                                <div onClick="location.href='{{ route('each_request', ['pickup_id' => $pickup_id]) }}'"
                                                                    class="m-2 
                                            flex mx-auto text-white bg-blue-400 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-xs">
                                                                    詳細をみる</div>
                                                            </div> --}}
                        </div>
                        {{-- リクエストに回答済み --}}
                    @elseif ($pickup->is_answered == '1')
                        <div
                            class="h-full flex flex-col md:flex-row items-center border-gray-200 border p-4 rounded-lg bg-white">
                            <div class="w-full flex flex-row md:w-1/2">
                                <div class="flex-row w-9/10">
                                    <h2 class="text-gray-900 title-font font-medium">
                                        {{ $pickup_user->name }}さんから受け取りリクエストに回答済です。
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
                            <div class="flex flex-row text-center w-full md:w-1/2">
                                <div class="flex flex-row w-full">
                                    <div class="w-1/2">
                                        <p class="text-xs p-2 text-left"> 回答した内容</p>
                                        <?php
                                        $result = $pickup->result;
                                        ?>
                                        @if ($result == 1)
                                            <input class="ml-8 rounded border-gray-300 text-yellow-500 shadow-sm"
                                                type="checkbox" checked onclick="return false;"> この人にあげる！

                                        @elseif( $result== 2)
                                            <input class="ml-8 rounded border-gray-300 text-red-400 shadow-sm"
                                                type="checkbox" checked onclick="return false;"> お断りする
                                        @endif
                                    </div>
                                    </button>
                                    {{-- <div class="flex justify-center w-full">
                                        <?php $pickup_id = $pickup->id; ?>
                                        <div onClick="location.href='{{ route('each_request', ['pickup_id' => $pickup_id]) }}'"
                                            class="m-2 
                                            flex mx-auto text-white bg-blue-400 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-xs">
                                            詳細をみる</div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endif

                </div>





                {{-- <div class="p-2 w-full ">
                    <div class="h-full flex flex-col items-center border-gray-200 border p-4 rounded-lg bg-white">
                        <div class="w-full flex flex-row">
                            <div class="flex-grow w-9/10 text-center">
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
                                @csrf --}}

                {{-- id --}}

                {{-- <input type="hidden" name="id" value="{{ $pickup->id }}"> --}}

                {{-- 回答済み --}}

                {{-- <input type="hidden" name="is_answered" value="1"> --}}

                {{-- getに渡す値 --}}

                {{-- <input type='hidden' name='content_id' value='{{ $pickup->fish_id }}'>

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
                </div> --}}



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
                {{-- 受取希望者の場合 --}}
            @else

                <div
                    class="h-full flex flex-col md:justify-around md:flex-row border-gray-200 border p-4 rounded-lg bg-white m-2">
                    <div class="flex flex-col m-2">
                        <p class="text-gray-500 text-xs"> あなたがリクエストした条件</p>
                        <div class="flex flex-row text-gray-500 items-center mt-2">

                            <div class="text-red-500 ml-4">
                                <?php
                                $datetime = 'datetime_' . $pickup->pickup;
                                $place = 'place_' . $pickup->pickup;
                                ?>
                                @if ($pickup->pickup != 4)
                                    <p>日時:
                                        {{ $content->$datetime }}
                                    </p>
                                    <p>{{ $content->$place }}</p>
                                @elseif($pickup->pickup == 4)
                                    <p>{{ $pickup->pickup_detail }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col m-2">
                        <p class="text-gray-500 text-xs"> 魚の出品者からの回答</p>
                        @if ($pickup->result == 1)
                            <div class="flex flex-row items-center ml-2"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-12 w-12 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>受取リクエストが承認されました！
                            </div>
                            <p class="text-xs ml-14">条件の日時に魚の受け取りを行ってください。</p>
                            <p class="text-xs ml-14">詳細について不明な点がある場合は、メッセージにて質問しましょう。</p>
                        @elseif($pickup->result == 2)
                            <div class="flex flex-row items-center ml-2"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-12 w-12 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>不成立となりました。
                            </div>
                            <p class="text-xs ml-14">残念ながら、今回のリクエストは不成立となりました。</p>
                            <p class="text-xs ml-14">出品者をフォローして、次の機会を待ちましょう！</p>
                        @else
                            <div class="flex flex-row items-center ml-2"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>まだ回答はありません。
                            </div>
                            <p class="text-xs ml-14">不明な点がある場合は、メッセージにて質問しましょう。</p>
                        @endif
                    </div>

                </div>
            @endif


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
                                受け取り場所:<br>
                                候補1: {{ $content['datetime_1'] }}{{ $content['place_1'] }}<br>
                                候補2:
                                {{ $content['datetime_2'] ? $content['datetime_2'] : 'なし' }}{{ $content['place_2'] ? $content['place_2'] : 'なし' }}<br>
                                候補3:
                                {{ $content['datetime_3'] ? $content['datetime_3'] : 'なし' }}{{ $content['place_3'] ? $content['place_3'] : 'なし' }}
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
                    <input type="hidden" name="pickup_id" value="{{ $pickup->id }}">
                    <input type="hidden" name="from" value="{{ Auth::id() }}">
                    <?php
                    if (Auth::id() == $pickup_user->id) {
                        $to_id = $created_user->id;
                    } else {
                        $to_id = $pickup_user->id;
                    }
                    ?>
                    <input type="hidden" name="to" value="{{ $to_id }}">
                    <textarea id="message" name="message" placeholder="メッセージを記入"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-sm outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    <button
                        class="flex mx-auto mb-2 text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-sm">送信</button>
                </form>


                @foreach ($messages as $message)


                    <div class="bg-gray-100 rounded flex px-4 py-2 h-full">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="3" class="text-gray-500 w-4 h-4 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                            </path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <?php
                        $from = $message->from;
                        ?>
                        @if ($from == $pickup_user->id)
                            <p class="text-xs">{{ $pickup_user->name }}</p>
                        @else
                            <p class="text-xs">{{ $created_user->name }}</p>
                        @endif
                    </div>
                    <div class="w-full p-4 h-full border text-xs mb-2">
                        <p class="text-sm">{{ $message->message }}</p>
                        <p class="text-gray-400">送信日時: {{ $message->created_at }}</p>
                    </div>


                @endforeach



            </div>
        </div>
</x-app-layout>
