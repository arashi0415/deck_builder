<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Player') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section id="profile">
                        <div class="profile-icon">
                            <input type="file" id="userIconInput" accept="image/*" onchange="previewImage('userIconInput', 'userIconPreview')" required>
                            <img id="userIconPreview" src="#" alt="User Icon Preview" width="100" height="100">
                        </div>
                        <!-- 他のプロフィール情報をここに追加 -->
                
                    <div class="profile-details">
                        <h2>プレイヤーネーム: John Doe</h2>
                        <p>タグ: #RPG #Strategy</p>
                        <p>プレイスタイル: Casual Player</p>
                    </div>
                
                </section>
                
                    <!-- FAVORITEカードセクション -->
                    <section id="favorite-cards">
                        <h2>FAVORITE Cards</h2>
                        <div class="card">
                            <input type="file" id="favoriteCardInput" accept="image/*" onchange="previewImage('favoriteCardInput', 'favoriteCardPreview')" required>
                            <img id="favoriteCardPreview" src="#" alt="Favorite Card Preview" width="372" height="520">
                            <!-- 他のカード情報をここに追加 -->
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
