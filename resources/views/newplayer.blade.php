<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Player') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-lg shadow-md p-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-xl font-bold bg-indigo-500 text-black p-2 rounded-md shadow-md">Register Your Profile</h1>

                <form method="POST" action="{{ route('player.store') }}" enctype="multipart/form-data">
                    @csrf  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <section id="profile" class="rounded-lg shadow-md">
                            <div class="mt-6">
                                <div id="profile-icon" class="rounded-full w-16 h-16">
                                    <input type="file" id="userIconInput" accept="image/*" onchange="previewImage('userIconInput', 'userIconPreview')">
                                    <img id="userIconPreview" src="#" alt="Profile Picture">
                                </div>

                                <div class="profile-details">
                                    <div class="mb-4">
                                        <label for="playerName" class="text-gray-700 font-bold">Player Name:</label>
                                        <input type="text" name="playerName" id="playerName" class="@error('playerName') border-red-500 @enderror w-full rounded-md shadow-sm" required>
                                        @error('playerName')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="tags" class="text-gray-700 font-bold">Tags (Comma separated):</label>
                                        <input type="text" name="tags" id="tags" class="@error('tags') border-red-500 @enderror w-full rounded-md shadow-sm" required>
                                        @error('tags')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="playStyle" class="text-gray-700 font-bold">Play Style:</label>
                                        <textarea name="playStyle" id="playStyle" class="@error('playStyle') border-red-500 @enderror w-full rounded-md shadow-sm"></textarea>
                                        @error('playStyle')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="bg-blue-600 text-black rounded-md px-1 py-1 border border-blue-600 hover:border-blue-700">Register Player</button>
                                </div>
                            </div>
                            <script>
                                const updateBtn = document.getElementById("update-btn");

                                updateBtn.addEventListener("click", () => {
                                    const playerName = document.querySelector(".profile-details h2 span").textContent;
                                    const tags = document.querySelector(".profile-details p:nth-child(2) span").textContent;
                                    const playStyle = document.querySelector(".profile-details p:nth-child(3) span").textContent;

                                    // サーバーへ更新内容を送信する処理
                                    // ...

                                    // 更新内容を反映
                                    document.querySelector(".profile-details h2 span").textContent = playerName;
                                    document.querySelector(".profile-details p:nth-child(2) span").textContent = tags;
                                    document.querySelector(".profile-details p:nth-child(3) span").textContent = playStyle;
                                });
                            </script>
                        </section>

                        <div class="flex flex-row">
                            <div class="w-1/2">
                                </div>
                            <div class="w-1/2">
                                <section id="favorite-cards" class="rounded-lg shadow-md">
                                    <h2 class="mt-4 text-2xl font-bold text-gray-800">FAVORITE Cards</h2>
                                    <div id="card" class="mt-4 grid grid-cols-1 gap-4 rounded-lg shadow-md">
                                        <input type="file" id="favoriteCardInput" accept="image/*" onchange="previewImage('favoriteCardInput', 'favoriteCardPreview')" required>
                                        <img id="favoriteCardPreview" src="#" width="372" height="520">
                                    </div>
                                </section>

                                <script>
                                    function previewImage(inputId, previewId) {
                                        const input = document.getElementById(inputId);
                                        const preview = document.getElementById(previewId);
                                
                                        const file = input.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>
                                
