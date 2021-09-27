{{-- <?php
use Carbon\Carbon;
$date1 = new Carbon('2021-05-05');
$date2 = new Carbon('2021-06-05');
echo '<pre>';
var_dump($date1->lt($date2));
// より小さい
echo '<pre>';
exit();
?> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-700 leading-tight">
            {{ __('取引中一覧 ') }}
        </h2>
    </x-slot>


    {{-- フラッシュメッセージ '魚の登録が完了しました' --}}
    @if (session('status'))
        <div class="p-2 w-full alert alert-success flex justify-center">
            <div class="bg-white border-gray-200 border rounded flex p-2 h-full items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                    class="text-red-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                    <path d="M22 4L12 14.01l-3-3"></path>
                </svg>
                <span class="title-font font-medium"> {{ session('status') }}</span>
            </div>
        </div>
    @endif



    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="mb-8">
                <div class="lg:w-3/5 mx-4 border-b border-gray-200">
                    出品中(受取募集中)の魚
                </div>

                <div>
                    @if ($count1 == 0)
                        現在、受取募集中の魚はありません

                    @else
                        {{-- もしcontent['created_user_id']==Auth::id()で、かつis_expired==nullだったらcontentを表示する (Controllerで選別済) --}}
                        {{-- forEach --}}
                        @foreach ($contents as $content)
                            <div class="flex flex-row text-blue-300 text-xs items-center justify-end pr-4">
                                <div class="mt-2 mx-4 flex flex-row font-xs"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        onClick="location.href='{{ route('edit', ['content_id' => $content->id]) }}'">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>編集</div>
                                <div class="mt-2 flex flex-row font-xs"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        onClick="location.href='{{ route('delete', ['content_id' => $content->id]) }}'">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>削除</div>
                            </div>
                            <div class="px-2 pb-2 w-full"
                                onClick="location.href='{{ route('detail', ['content_id' => $content->id]) }}'">
                                <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                                    <img class="w-16 h-16 bg-gray-100 object-contain object-center flex-shrink-0 mr-4"
                                        src="{{ asset('storage/images/' . $content->id) }}"
                                        alt="{{ asset('storage/images/' . $content->id) }}">
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium">{{ $content->title }}</h2>
                                        <p class="text-gray-500">期限: {{ $content->limit }}</p>
                                    </div>
                                    {{-- <div class="flex flex-col md:flex-row text-blue-300 items-center justify-center">
                                        <div class="m-2 flex flex-row font-xs"><svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                onClick="location.href='{{ route('edit', ['content_id' => $content->id]) }}'">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>編集</div>
                                        <div class="m-2 flex flex-row font-xs"><svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                onClick="location.href='{{ route('delete', ['content_id' => $content->id]) }}'">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>削除</div>
                                    </div> --}}
                                </div>
                            </div>

                        @endforeach

                        {{-- END forEach --}}
                    @endif
                </div>

            </div>



            <div class="mb-8">
                <div class="lg:w-3/5 mx-4 border-b border-gray-200">
                    受取リクエストした魚
                </div>

                <div>
                    {{-- @if ($count2 == 0)
                        現在、受取リクエスト中の魚はありません --}}

                    @if ($count2 >= 1)
                        {{-- もしpickupsのpickup_user_id==Auth::id()かつ、is_expired==nullだったらpickupsを表示する->controllerで処理 --}}
                        {{-- forEach --}}
                        @foreach ($pickups as $pickup)


                            <div class="p-2 w-full"
                                onClick="location.href='{{ route('each_request', ['pickup_id' => $pickup->pickup_id]) }}'">
                                <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                                    <img class="w-16 h-16 bg-gray-100 object-contain object-center flex-shrink-0 mr-4"
                                        src="{{ asset('storage/images/' . $pickup->content_id) }}"
                                        alt="{{ asset('storage/images/' . $pickup->content_id) }}">
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium">{{ $pickup->title }}
                                        </h2>
                                        <?php
                                        $datetime = 'datetime_' . $pickup->pickup;
                                        $place = 'place_' . $pickup->pickup;
                                        ?>
                                        <p class="text-gray-500 text-xs">リクエストした条件</p>
                                        @if ($pickup->pickup != 4)
                                            <p class="text-gray-500">日時:
                                                {{ $pickup->$datetime }}
                                            </p>
                                            <p class="text-gray-500">{{ $pickup->$place }}</p>
                                        @elseif($pickup->pickup == 4)
                                            <p class="text-gray-500">{{ $pickup->pickup_detail }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- @else --}}
                            {{-- $a==$bじゃなかったら表示しない --}}
                            {{-- @endif --}}

                        @endforeach

                        {{-- END forEach --}}

                    @elseif($count2 == 0)
                        <p class="ml-4">現在、受取リクエスト中の魚はありません</p>
                    @endif
                </div>


            </div>



        </div>
    </div>
</x-app-layout>
