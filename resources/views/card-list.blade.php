<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Card List') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 1000px;">
                <div class="mb-4">
                    <div class="mb-4">
                        @if (count($cards) > 0)
                            <div class="grid grid-cols-6 gap-6">
                                @foreach ($cards as $card)
                                    <div class="card" >
                                        <img src="{{ asset('storage/cards/' . $card->my_card) }}" alt="" class="h-22  object-cover">
                                        <div class="">
                                            <p class="">カード名:{{ $card->card_name }}</p>
                                            <p class="">{{ $card->number }}枚</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No cards found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class=" " onclick="window.location.href = '{{ route('card_list.create') }}'">
        <ion-icon name="caret-forward-outline"
            class=" mt-2 p-2 bg-orange-500 rounded-full text-3xl text-white border-2 border-orange-500 hover:bg-white hover:text-orange-500">
        カードを登録</ion-icon>
    </button>
</x-app-layout>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>

