{{-- <?php
var_dump($like_num);
exit();
?> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>

    {{-- フラッシュメッセージ --}}
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

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 bg-white flex justify-center">

            <div class="sm:w-1/3 text-center sm:py-8 m-4">


                @if (Auth::id() == $user_data['id'])
                    <div class="relative  text-blue-500 ">
                        <a href='{{ route('myprofile_edit') }}' class="text-xs absolute right-0 top-2">プロフィールを編集する
                        </a>
                    </div>
                @else
                    <button class="p-2 w-full">
                        <form action="{{ route('like_create') }}" method="post">
                            <button class="p-2 w-full">
                                @csrf
                                <input type="hidden" name="user_id" value={{ Auth::id() }}>
                                <input type="hidden" name="liked_user_id" value="{{ $user_data['id'] }}">
                                <div class="w-full flex justify-end flex-row items-center">
                                    @if ($like_num != 0)
                                        <p class="text-xs">お気に入りしています</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @else
                                        <p class="text-xs">お気に入りに追加 </p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    @endif

                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg> --}}
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    <p class="text-xs">お気に入りに追加</p> --}}
                                </div>
                            </button>
                        </form>

                @endif


                @if ($user_data['file_path'] == null)
                    <div
                        class="m-4 w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>

                @else
                    <div class="inline-flex items-center justify-center w-40 h-40 rounded-full">
                        <img class="rounded-full object-cover" src="{{ asset('storage/' . $user_data['file_path']) }}"
                            alt="{{ asset('storage/' . $user_data['file_path']) }}">
                    </div>
                @endif
                {{-- <div
                    class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400 my-4">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div> --}}
                {{-- <div class="flex flex-col items-center text-center justify-center my-4">

                    <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $user_data['name'] }}
                    </h2>
                    <div class="w-12 h-1 bg-blue-500 rounded mt-2 mb-4 "></div>
                </div> --}}

                <table class="w-full">
                    <tbody>
                        <tr>
                            <td class="w-1/3 text-right text-sm text-gray-600 border px-4 py-2">名前</td>
                            <td class="w-2/3 border px-4 py-2">{{ $user_data['name'] }}</td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-right text-sm text-gray-600 border px-4 py-2">メールアドレス</td>
                            <td class="w-2/3 border px-4 py-2">{{ $user_data['email'] }}</td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-right text-sm text-gray-600 border px-4 py-2">自己紹介</td>
                            <td class="border px-4 py-2">
                                @if (null !== $user_data['comment'])
                                    {{ $user_data['comment'] }}
                                @else
                                    コメントはまだ記載されていません
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-right text-sm text-gray-600 border px-4 py-2">利用目的</td>
                            <td class="w-2/3 border px-4 py-2">
                                <div class="p-2 w-full flex flex-row">
                                    <div class="w-1/2">
                                        <input class="rounded border-gray-300 text-blue-600 shadow-sm" type="checkbox"
                                            name="giver" value="1" {{ $user_data['giver'] ? 'checked' : '' }}
                                            onclick="return false;">
                                        <label for="scales" class="text-sm">魚をあげたい</label>
                                    </div>
                                    <div class="w-1/2">
                                        <input class="rounded border-gray-300 text-blue-600 shadow-sm" type="checkbox"
                                            name="receiver" value="1" {{ $user_data['receiver'] ? 'checked' : '' }}
                                            onclick="return false;">

                                        <label for="scales" class="text-sm">魚が欲しい</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
