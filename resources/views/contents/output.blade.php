<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="h-25 m-4" onClick="location.href='{{ route('pickup_guide') }}'">
        <img src="{{ asset('image/pickup-guide.png') }}" alt="受け取りガイド">
        <p class="lg:w-2/3 mx-auto leading-relaxed text-sm text-center text-gray-900">↑魚の受け取り応募方法はこちらをcheck!</p>
    </div>

    <div class="py-4">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
            <div class="flex flex-wrap">
                <p class="px-4 text-gray-600 text-md">受け取り募集中の魚</p>
                @foreach ($items as $item)
                    <div class="px-4 py-2 md:w-1/4"
                        onClick="location.href='{{ route('detail', ['content_id' => $item['id']]) }}'">
                        <div
                            class="bg-white h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden shadow-sm">
                            @if (isset($item['file_path']))
                                {{-- block relative flex justify-center --}}
                                <div class="block relative h-48 rounded overflow-hidden">
                                    <img src="{{ asset('storage/images/' . $item['id']) }}"
                                        alt="{{ asset('storage/images/' . $item['id']) }}">
                                </div>
                                <div class="p-6">
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                        {{ $item['title'] }}</h1>
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        受け取り場所:
                                        {{ $item['place_1'] }}/{{ $item['place_2'] }}/{{ $item['place_3'] }}
                                    </h2>
                                    {{-- <p class="leading-relaxed mb-3">{{ $item['content'] }}</p> --}}
                                    <div class="text-right flex-wrap mt-4">
                                        <p class="text-red-500 text-xs">
                                            申込締め切りまであと○日○時間
                                        </p>

                                        {{-- 詳細ボタン --}}
                                        {{-- <a href="{{ route('detail', ['content_id' => $item['id']]) }}"
                                            class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 text-sm">詳細をみる
                                        </a> --}}
                                        {{-- 詳細ボタン END --}}

                                        {{-- 編集ボタン --}}
                                        {{-- <form action="{{ route('edit', ['content_id' => $item['id']]) }}" method="get"
                                            id="edit_{{ $item['id'] }}">
                                            @csrf
                                            <input type="hidden" name="id">
                                            <input type="submit" value="編集">
                                        </form> --}}
                                        {{-- 編集ボタン END --}}

                                        {{-- 削除ボタン --}}
                                        {{-- <form action="{{ route('delete', ['content_id' => $item['id']]) }}"
                                            method="get" id="delete_{{ $item['id'] }}">
                                            @csrf
                                            <input type="hidden" name="id">
                                            <input type="submit" value="削除">
                                        </form> --}}
                                        {{-- 削除ボタン END --}}
                                    </div>
                                </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
            {{-- </div> --}}
        </div>
    </div>

    {{-- 削除していいか確認 --}}
    {{-- <script>
        function deletePost(e) {
            'use strict';
            if (comfirm('この投稿を削除しますか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script> --}}
    {{-- 削除していいか確認 END --}}
</body>

</html>
