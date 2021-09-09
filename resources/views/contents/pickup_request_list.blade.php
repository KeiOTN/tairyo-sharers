{{-- <?php
echo '<pre>';
var_dump($lists[0]['pickup_detail']); 配列の書き方
$lists[0]->['pickup_detail']; オブジェクトの書き方
echo '<pre>';

exit();

 $item["id"]
$item["fish_id"]
 $item["pickup_user_id"]
 $item["pickup"]
$item["pickup_detail"]
$item["created_at"]
$item["updated_at"]

?> --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-800 leading-tight">
            {{ __('魚の受け取りリクエスト受付状況') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- @foreach ($lists as $list)
                {{ $list['fish_id'] }}
                {{ $list['pickup_user_id'] }}
                {{ $list['pickup'] }}
                {{ $list['pickup_detail'] }}
            @endforeach --}}

            {{-- 魚の情報 ① --}}
            <div class="px-4 py-2 md:w-1/4">
                <div onClick="location.href='{{ route('pickup_request_detail') }}'"
                    class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-sm">

                    <div
                        class="bg-blue-200 block relative h-24 rounded overflow-hidden flex items-center justify-center">
                        {{-- <img src="{{ asset('image/noimage.png') }}" alt=""> --}}
                        <p class="text-center text-white font-bold text-md">NO IMAGE</p>
                    </div>
                    <div class="p-6">
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                            さかな001</h1>
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                            受け取り場所:
                            鐘崎漁港17:00/ヨシダ釣具18:00/博多駅周辺19:00
                        </h2>

                        <div class="flex-wrap mt-4">
                            <p class="text-red-500 text-sm">
                                3件の受け取りリクエストがあります
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 魚の情報 ② --}}
            <div class="px-4 py-2 md:w-1/4">
                <div
                    class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-sm">

                    <div
                        class="bg-yellow-200 block relative h-24 rounded overflow-hidden flex items-center justify-center">
                        {{-- <img src="{{ asset('image/noimage.png') }}" alt=""> --}}
                        <p class="text-center text-white font-bold text-md">NO IMAGE</p>
                    </div>
                    <div class="p-6">
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                            さかな002</h1>
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                            受け取り場所:
                            鐘崎漁港17:00/ヨシダ釣具18:00/博多駅周辺19:00
                        </h2>

                        <div class="flex-wrap mt-4">
                            <p class="text-red-500 text-sm">
                                1件の受け取りリクエストがあります
                            </p>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
</x-app-layout>
