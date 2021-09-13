<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイプロフィール編集') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 bg-white">

            <form action="{{ route('myprofile_update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-12 mx-auto">
                        <div class="lg:w-1/2 md:w-2/3 mx-auto flex flex-col">

                            {{-- 登録されていた画像を表示 --}}
                            <div>現在登録されている画像</div>
                            {{-- @if (isset($user_data['file_path'])) --}}
                            @if ($user_data['file_path'] == '')
                                <div
                                    class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                        viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>

                            @else
                                <img src="{{ asset('storage/users/' . $user_data['id']) }}"
                                    alt="{{ asset('storage/users/' . $user_data['id']) }}">
                            @endif

                            {{-- 新しい画像をアップロード --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span>
                                    <label for="" class="leading-7 text-sm text-gray-600">新しく登録する画像を選択</label>
                                    <input type="file" id="" name=""
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            {{-- 名前 --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <span class="text-white bg-red-400 border-0 py-1 px-2 rounded text-sm">必須</span>
                                    <label for="title" class="leading-7 text-sm text-gray-600">ユーザー名</label>
                                    <input type="text" id="name" name="name" value="{{ $user_data['name'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            {{-- メールアドレス --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <span class="text-white bg-red-400 border-0 py-1 px-2 rounded text-sm">必須</span>
                                    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                    <input type="email" id="email" name="email" value="{{ $user_data['email'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- 自己紹介 --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">任意</span>
                                    <label for="comment" class="leading-7 text-sm text-gray-600">自己紹介</label>
                                    {{-- <input type="text" id="comment" name="comment" value="{{ $user_data['comment'] }}"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}

                                    {{ Form::textarea('comment', old('comment') ?? ($user_data['comment'] ?? ''), [
    'class' => 'w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-sm outline-none text-gray-700 resize-none leading-6 transition-colors duration-200 ease-in-out' . ($errors->has('comment') ? ' is-invalid' : ''),
    'required' => true,
]) }}
                                </div>
                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>


                            {{-- @error('file')
                                {{ $message }}
                                <br>
                            @enderror --}}

                            {{-- 提供者 or 受取者 --}}
                            <div class="p-2 w-full flex flex-col">
                                <div class="relative">
                                    <span class="text-white bg-blue-400 border-0 py-1 px-2 rounded text-sm">複数選択可</span>
                                    <label for="giver_or_reciever" class="leading-7 text-sm text-gray-600">利用目的</label>
                                </div>
                                <div class="p-2 w-full flex flex-row justify-center">
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="giver" value="1"
                                            {{ $user_data['giver'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm font-black">魚をあげたい</label>
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                            type="checkbox" name="receiver" value="1"
                                            {{ $user_data['receiver'] ? 'checked' : '' }}>
                                        <label for="scales" class="text-sm font-black">魚が欲しい</label>
                                    </div>
                                </div>
                            </div>



                            <div class="p-2 w-full">
                                {{-- backボタン --}}
                                {{-- <a href="{{ route('todo.index') }}" class="block text-center w-5/12 py-3 mt-6 font-medium tracking-widest text-black uppercase bg-gray-100 shadow-sm focus:outline-none hover:bg-gray-200 hover:shadow-none">Back</a> --}}
                                {{-- 登録ボタン --}}
                                <button
                                    class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">登録</button>
                            </div>
                        </div>
                    </div>
                </section>


        </div>
    </div>

</x-app-layout>
