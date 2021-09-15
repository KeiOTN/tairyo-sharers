<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 bg-white">
            <div class="sm:w-1/3 text-center sm:py-8 m-4">

                @if (Auth::id() == $user_data['id'])
                    <div class="relative  text-blue-500 ">
                        <a href='{{ route('myprofile_edit') }}' class="text-xs absolute right-0 top-2">プロフィールを編集する
                        </a>
                    </div>
                @else

                @endif
                <div
                    class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400 my-4">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
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
