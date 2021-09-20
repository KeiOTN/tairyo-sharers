{{-- <?php
var_dump($count2);
exit();
?> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-700 leading-tight">
            {{ __('取引中一覧 ') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="lg:w-3/5 mx-4 border-b border-gray-200">
                    受取募集中の魚
                </div>

                <div>
                    @if ($count1 == 0)
                        現在、受取募集中の魚はありません

                    @else
                        {{-- もしcontent['created_user_id']==Auth::id()で、かつis_expired==nullだったらcontentを表示する (Controllerで選別済) --}}
                        {{-- forEach --}}
                        @foreach ($contents as $content)
                            <div class="p-2 lg:w-1/3 md:w-1/2 w-full"
                                onClick="location.href='{{ route('detail', ['content_id' => $content->id]) }}'">
                                <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                                    <img class="w-16 h-16 bg-gray-100 object-contain object-center flex-shrink-0 mr-4"
                                        src="{{ asset('storage/images/' . $content->id) }}"
                                        alt="{{ asset('storage/images/' . $content->id) }}">
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium">{{ $content->title }}</h2>
                                        <p class="text-gray-500">期限: {{ $content->limit }}</p>
                                    </div>
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
                    @if ($count2 == 0)
                        現在、受取リクエスト中の魚はありません

                    @else
                        {{-- もしpickupsのpickup_user_id==Auth::id()かつ、is_expired==nullだったらpickupsを表示する --}}
                        {{-- forEach --}}
                        @foreach ($pickupss as $pickup)
                            <div class="p-2 lg:w-1/3 md:w-1/2 w-full"
                                onClick="location.href='{{ route('each_request', ['pickup_id' => $pickup->content_id]) }}'">
                                <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-white">
                                    <img class="w-16 h-16 bg-gray-100 object-contain object-center flex-shrink-0 mr-4"
                                        src="{{ asset('storage/images/' . $pickup->content_id) }}"
                                        alt="{{ asset('storage/images/' . $pickup->content_id) }}">
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium">{{ $pickup->title }}</h2>
                                        {{-- <p>{{ $item['datetime_1'] }}</p>
                                                <p>{{ $item['place_1'] }}</p> --}}
                                        <?php
                                        $datetime = '$pickup->datetime_';
                                        $place = '$pickup->place_';
                                        ?>
                                        <p class="text-gray-500">日時: {{ $datetime . $pickup->pickup }}</p>
                                        <p class="text-gray-500">{{ $place . $pickup->pickup }}</p>
                                        <p class="text-gray-500">{{ $pickup->detail }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- END forEach --}}
                    @endif
                </div>


            </div>



        </div>
    </div>
</x-app-layout>
