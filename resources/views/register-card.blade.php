<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Card register') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="uploaded-cards"></div>
                <form id="card-form" action="{{ route('card_list.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="card-upload-area">
                        <div class="card-upload-container">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>カードをドラッグ&ドロップ</p>
                            <input type="file" name="images[]" id="input-files" multiple>
                        </div>
                        <div class="uploaded-cards-container"></div>
                    </div>
                    
                    <div class="uploaded-cards"></div>
                    
                    <div class="card-info-area" >
                        {{-- <input type="text" name="card_name" placeholder="カード名" >
                        <input type="number" name="card_quantity" placeholder="枚数"> --}}
                    </div>
                    <button type="submit" id="submit-btn">送信</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
 const inputFiles = document.getElementById('input-files');
    const uploadedCardsContainer = document.querySelector('.uploaded-cards-container');
    let isCardInfoAreaVisible = false; // Flag to control visibility

    // Drag & Drop handling (unchanged)

    // Handle multiple image selection and preview
    inputFiles.addEventListener('change', function() {
        const files = this.files;
        if (!files.length) return;

        handleFiles(files);

        // Toggle card-info-area visibility
        isCardInfoAreaVisible = true; // Set flag to true for subsequent drops
        const cardInfoAreas = document.querySelectorAll('.uploaded-card-wrapper .card-info-area');
        for (const cardInfoArea of cardInfoAreas) {
            cardInfoArea.style.display = 'block'; // Always display card-info-area for subsequent drops
        }
    });

    function handleFiles(files) {
        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function() {
                const uploadedCardWrapper = document.createElement('div');
                uploadedCardWrapper.classList.add('uploaded-card-wrapper');

                const img = document.createElement('img');
                img.src = this.result;
                img.classList.add('uploaded-card');
                uploadedCardWrapper.appendChild(img);

                // Add card name and quantity elements (unchanged)

                // Create and append card-info-area conditionally
                const cardInfoArea = document.createElement('div');
                cardInfoArea.classList.add('card-info-area');
                if (isCardInfoAreaVisible) {
                    cardInfoArea.style.display = 'block'; // Show if flag is true
                }
                cardInfoArea.innerHTML = `
                <input type="text" name="card_name" placeholder="カード名">
                <input type="number" name="card_quantity" placeholder="枚数">
                `;
                uploadedCardWrapper.appendChild(cardInfoArea);

                uploadedCardsContainer.appendChild(uploadedCardWrapper);
            };
            reader.readAsDataURL(file);
        }
    }

    // Toggle card-info-area visibility (add this)
    document.querySelector('.card-upload-container').addEventListener('click', function() {
        isCardInfoAreaVisible = !isCardInfoAreaVisible; // Toggle flag
        const cardInfoAreas = document.querySelectorAll('.uploaded-card-wrapper .card-info-area');
        for (const cardInfoArea of cardInfoAreas) {
            cardInfoArea.style.display = isCardInfoAreaVisible ? 'block' : 'none';
        }
    });

    // フォーム送信時にJavaScriptで収集されたデータを追加
    document.getElementById('card-form').addEventListener('submit', function(event) {
    // デフォルトのフォーム送信をキャンセル
    event.preventDefault(); 

    const formData = new FormData(this); // FormDataオブジェクトを作成

    // LaravelのCSRFトークンをフォームデータに追加
    

    // 各カードの情報を収集してFormDataに追加
    const cardWrappers = document.querySelectorAll('.uploaded-card-wrapper');
    cardWrappers.forEach((cardWrapper, index) => {
        const cardNameInput = cardWrapper.querySelector('.card-info-area input[name="card_name"]');
        const cardQuantityInput = cardWrapper.querySelector('.card-info-area input[name="card_quantity"]');
        if (cardNameInput && cardQuantityInput) {
            formData.append(`card_name_${index}`, cardNameInput.value);
            formData.append(`card_quantity_${index}`, cardQuantityInput.value);
        } else {
            console.error("Failed to find input elements.");
        }
    });

    // ここでデフォルトのPOST送信をトリガー
    this.submit();
});
</script>
