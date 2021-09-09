<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-800 leading-tight">
            {{ __('魚情報 詳細') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="text-center">
                <p> 魚の受け取り希望を送信しました</p><br>
                <button onClick="location.href='{{ route('dashboard') }}'"
                    class="my-2 p-2 bg-white border flex mx-auto  border-0 focus:outline-none hover:bg-gray-400 text-sm">Topに戻る</button>
                {{-- <button
                    class="my-2 p-2 bg-white border flex mx-auto  border-0 focus:outline-none hover:bg-gray-400 text-sm">
                    前ページに戻る</button> --}}

            </div>

        </div>
    </div>
</x-app-layout>
