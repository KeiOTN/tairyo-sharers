<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-700 leading-tight">
            {{ __('取引募集中の魚一覧') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="h-25 m-4 flex justify-center items-center flex-col"
                onClick="location.href='{{ route('pickup_guide') }}'">
                <img src="{{ asset('image/pickup-guide.png') }}" alt="受け取りガイド">
                <p class="lg:w-2/3 mx-auto leading-relaxed text-sm text-center text-gray-900">↑魚の受け取り応募方法はこちらをcheck!</p>
            </div>
            {{-- 登録されている魚一覧 --}}
            <p class="px-4 text-gray-600 text-md">取引募集中の魚</p>
            <div class="flex flex-wrap">
                @foreach ($items as $item)
                    <div class="px-4 py-2 md:w-1/4 w-full "
                        onClick="location.href='{{ route('detail', ['content_id' => $item->id]) }}'">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 
                            {{-- rounded-lg --}}
                            overflow-hidden shadow-sm">
                            @if (isset($item->file_path))
                                {{-- block relative flex justify-center --}}
                                <div
                                    class="block relative h-48 bg-gray-200
                                    {{-- rounded --}}
                                     overflow-hidden flex justify-center">
                                    {{-- <img src="{{ asset('storage/' . $item['file_path']) }}"
                                        alt="{{ asset('storage/' . $item['file_path']) }}"> --}}
                                    <img src="{{ asset('storage/images/' . $item->id) }}"
                                        alt="{{ asset('storage/images/' . $item->id) }}">
                                </div>

                                <div class="p-6">
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                        {{ $item->title }}</h1>
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-600 mb-1">
                                        受け取り候補1: {{ $item->datetime_1 }} / {{ $item->place_1 }}</h2>

                                    @if ($item->datetime_2 != null)
                                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-600 mb-1">
                                            受け取り候補2:{{ $item->datetime_2 }} / {{ $item->place_2 }} </h2>
                                    @else
                                    @endif

                                    @if ($item->datetime_2 != null)
                                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-600 mb-1">
                                            受け取り候補3:{{ $item->datetime_3 }} / {{ $item->place_3 }} </h2>
                                    @else
                                    @endif

                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-600 mb-1">
                                        出品者ID:

                                        {{ $item->created_user_id }}
                                    </h2>
                                    {{-- <p class="leading-relaxed mb-3">{{ $item['content'] }}</p> --}}
                                    {{-- <div class="text-right flex-wrap mt-4">
                                        <p class="text-red-500 text-xs">申込締め切りまであと○日○時間</p>
                                    </div> --}}
                                </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
            {{-- 登録されている魚一覧 END --}}
        </div>
    </div>
</x-app-layout>
