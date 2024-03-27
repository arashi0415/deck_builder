<div class="flex justify-center  ">
    <nav class="self-center w-full max-w-7xl  ">
        <div class="flex flex-col lg:flex-row justify-around items-center ">
            <h1 class="uppercase pl-5 py-4 text-lg font-sans font-bold">deck builder</h1>
            <ul class="hidden lg:flex items-center text-[18px] font-semibold pl-32">
                
            </ul>
            <div class=" text-center text-base pr-5  inline-flex"> <a href="#"
                    class="w-8 h-8 inline-block rounded-full pt-[6px] hover:text-blue-500"><i
                        class="fa fa-twitter"></i></a> <a href="#"
                    class="w-8 h-8 inline-block rounded-full pt-[5px] hover:text-blue-500"><i
                        class="fa fa-instagram"></i></a> <a href="#"
                    class="w-8 h-8 inline-block rounded-full pt-[5px] hover:text-blue-500"><i
                        class="fa fa-facebook"></i></a> <a href="#"
                    class="w-8 h-8 inline-block rounded-full pt-[5px] hover:text-blue-500"><i
                        class="fa fa-google"></i></a> <a href="#"
                    class="w-8 h-8 inline-block rounded-full pt-[5px] hover:text-blue-500"><i
                        class="fa fa-linkedin"></i></a> </div>
        </div>
    </nav>
</div>
<div class="relative right-10 top-10 flex justify-center p-8">
    <div class="flex flex-col justify-center">

        <div class="flex flex-col lg:flex-row max-w-5xl justify-between items-center p-2 space-y-3">  <div class="flex flex-col items-center lg:text-left text-center justify-between space-y-6 px-8">
                <div class="flex flex-col items-start space-y-3">
                    <div class="text-3xl md:text-5xl font-bold px-8">
                        WELCOME
                    </div>
                    <div class="text-3xl text-orange-500 md:text-5xl font-bold px-8">
                        This Start
                    </div>
                    <div class="h-1 rounded-2xl w-20 bg-orange-500 ml-10"></div>
                </div>
                @if (Route::has('login'))
                <div class='lg:flex relative top-10 '>
                    <button class=" " onclick="window.location.href = '{{ route('login') }}'">
                        <ion-icon name="caret-forward-outline"
                            class=" mt-2 p-2 bg-orange-500 rounded-full text-3xl text-white border-2 border-orange-500 hover:bg-white hover:text-orange-500">
                            ログイン</ion-icon>
                    </button>
                    <button class="relative left-5 " onclick="window.location.href = '{{ route('register') }}'">
                        <ion-icon name="caret-forward-outline"
                            class="mt-2 p-2 bg-orange-500 rounded-full text-3xl text-white border-2 border-orange-500 hover:bg-white hover:text-orange-500">
                            新規登録</ion-icon>
                    </button>
                </div>
                @endif
            </div>
            <div class="flex space-x-2 md:space-x-6 relative w-1/2">
                <div class="flex justify-center items-center">
                    <img src="{{ Storage::url('default/card_bulider.png') }}" alt="" class="w-full h-full object-cover md:max-w-lg md:max-h-lg lg:max-w-md lg:max-h-md" />

                    {{-- <img src="{{ asset('default/card_bulider.png') }}" alt="" class="w-full h-full object-cover md:max-w-lg md:max-h-lg lg:max-w-md lg:max-h-md" /> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>

