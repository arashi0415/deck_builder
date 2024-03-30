<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-lg shadow-md p-4">
            <h1 class="text-xl font-bold bg-indigo-500 text-black p-2 rounded-md shadow-md">Search</h1>
            <form method="GET" action="{{ route('search.index') }}" class="mt-4">
                <div class="mb-4">
                    <label for="search" class="text-gray-700 font-bold">Search:</label>
                    <input type="text" name="query" id="search" class="w-full rounded-md shadow-sm">
                </div>
                <button type="submit" class="bg-blue-600 text-black rounded-md px-4 py-2 border border-blue-600 hover:border-blue-700">Search</button>
            </form>

            @isset($cards)
                @foreach ($cards as $card)
                    <div class="mt-4">
                        <div class="mb-4">
                            <p class="text-gray-700 font-bold">Card Name: {{ $card->card_name }}</p>
                            <p class="text-gray-700 font-bold">Number: {{ $card->number }}</p>
                            <img src="{{ asset('storage/cards/' . $card->my_card) }}" alt="Card Image" class="mt-4 w-64 h-auto">
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-700 font-bold">検索結果が見つかりませんでした。</p>
            @endisset
        </div>
    </div>
</x-app-layout>
