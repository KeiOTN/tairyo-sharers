<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイプロフィール編集') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 bg-white">



            @if ($like_model->like_exist(Auth::user()->id, $liked_user->id))
                <p class="favorite-marke">
                    <a class="js-like-toggle loved" href="" data-postid="{{ $liked_user->id }}"><i
                            class="fas fa-heart"></i></a>
                    <span class="likesCount">{{ $liked_user->likes_count }}</span>
                </p>
            @else
                <p class="favorite-marke">
                    <a class="js-like-toggle" href="" data-postid="{{ $liked_user->id }}"><i
                            class="fas fa-heart"></i></a>
                    <span class="likesCount">{{ $liked_user->likes_count }}</span>
                </p>
            @endif​











        </div>
    </div>
</x-app-layout>
