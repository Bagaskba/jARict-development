@extends('user/components/layout')

@section('content')
    <div class="flex lg:hidden">
        @include('user/components/carousel')
    </div>
    <div class="relative">
        <!-- CAROUSEL -->
        <div class="z-10 hidden lg:flex">
            <div id="default-carousel" class="relative w-full h-screen" data-carousel="slide">
                <div class="mt-16 lg:mt-12 relative overflow-hidden md:h-[800px]">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/fik_awards.webp') }}"
                            class="absolute block w-full -translate-x-1/2 left-1/2" alt="..."
                            style="object-fit: cover; object-position: top; height: 92vh;">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/foto_produk.webp') }}"
                            class="absolute block w-full -translate-x-1/2 left-1/2" alt="..."
                            style="object-fit: cover; object-position: top; height: 92vh;">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/bakar_bakar.webp') }}"
                            class="absolute block w-full -translate-x-1/2 left-1/2" alt="..."
                            style="object-fit: cover; object-position: top; height: 92vh;">
                    </div>
                </div>
            </div>
        </div>
        <!-- END CAROUSEL -->
        <!-- HERO -->
        <div class="z-20 hidden lg:flex absolute top-0 left-0 w-full h-screen"
            style="background-color: rgba(0, 0, 0, 0.75);">
            <div class="max-w-screen-lg px-8 lg:pt-8 xl:px-16 mx-auto">
                <div class="grid grid-flow-row sm:grid-flow-row grid-cols-1 sm:grid-cols-2 mt-20">
                    <div class="flex justify-center items-center sm:order-2">
                        <div class="w-full h-full">
                            <img src="{{ asset('assets/logo.png') }}" alt="LOGO JARICT" quality="100"
                                layout="responsive" />
                        </div>
                    </div>
                    <div class="flex flex-col justify-center text-white items-start sm:text-left sm:order-1">
                        <h1 class="text-3xl lg:text-4xl xl:text-5xl font-medium text-black-600 leading-normal">
                            <img src="{{ asset('assets/jarict-text.png') }}" class="w-64">
                        </h1>
                        <p class="text-white font-semibold mt-4 mb-6">
                            <strong>jARict</strong> adalah singkatan dari Javanese Augmented Reality in Computational Try On
                        </p>
                        <div class="mb-6">
                            <span>
                                Merupakan platform website berbasis Augmented Reality (AR) yang digunakan untuk mencoba
                                baju batik secara virtual. Ini membantu pengalaman berbelanja menjadi lebih mudah dan
                                praktis.
                            </span>
                        </div>
                        <a class="mbpy-3 lg:py-4 px-12 lg:px-16 text-white font-semibold rounded-lg bg-orange-500 hover:shadow-orange-md transition-all outline-none"
                            href="#recommendation">Try On</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDHERO -->
    </div>
    <!-- HERO -->
    <div class="lg:hidden max-w-screen-lg px-8 lg:pt-8 xl:px-16 mx-auto">
        <div class="grid grid-flow-row sm:grid-flow-row grid-cols-1 sm:grid-cols-2">
            <div class="flex justify-center items-center sm:order-2">
                <div class="w-full h-full">
                    <img src="/assets/logo.png" alt="LOGO JARICT" quality="100" layout="responsive" />
                </div>
            </div>
            <div class="flex flex-col justify-center items-start sm:items-center sm:text-center sm:order-1">
                <h1 class="text-3xl lg:text-4xl xl:text-5xl font-medium text-black-600 leading-normal">
                    <img src="/assets/jarict-text.png">
                </h1>
                <p class="text-black-500 mt-4 mb-6">
                    <strong>jARict</strong> adalah singkatan dari Javanese Augmented Reality in Computational Try ON
                </p>
                <div class="mb-6">
                    <span>
                        Merupakan platform website berbasis Augmented Reality (AR) yang digunakan untuk mencoba
                        baju batik secara virtual. Ini membantu pengalaman berbelanja menjadi lebih mudah dan praktis.
                    </span>
                </div>
                <a class="py-3 lg:py-4 px-12 lg:px-16 text-white font-semibold rounded-lg bg-orange-500 hover:shadow-orange-md transition-all outline-none"
                    href="#recommendation">Try ON</a>
            </div>
        </div>
    </div>
    <!-- ENDHERO -->
    <!-- CARD -->
    <div class="flex justify-center items-center my-6 lg:my-2 overflow-hidden">
        <div class="flex flex-nowrap max-w-full overflow-x-auto md:overflow-visible">
            <div
                class="flex flex-col justify-center items-center bg-white-300 rounded-lg border border-gray-400 shadow-md p-8 m-2 w-full md:w-1/2 lg:w-1/3 hover:shadow-lg transition-all">
                <i class="fa-solid fa-location-dot text-orange-500"></i>
                <span class="text-gray-700 font-medium text-sm text-center mt-2 overflow-hidden break-words">Produk Asli
                    Kampung Batik Semarang</span>
            </div>
            <div
                class="flex flex-col justify-center items-center bg-white-300 rounded-lg border border-gray-400 shadow-md p-8 m-2 w-full md:w-1/2 lg:w-1/3 hover:shadow-lg transition-all">
                <i class="fa-solid fa-thumbs-up text-orange-500"></i>
                <span class="text-gray-700 font-medium text-sm text-center mt-2 overflow-hidden break-words">Kualitas
                    Terjamin</span>
            </div>
            <div
                class="flex flex-col justify-center items-center bg-white-300 rounded-lg border border-gray-400 shadow-md p-8 m-2 w-full md:w-1/2 lg:w-1/3 hover:shadow-lg transition-all">
                <i class="fa-solid fa-camera text-orange-500"></i>
                <span class="text-gray-700 font-medium text-sm text-center mt-2 overflow-hidden break-words">Bisa Virtual
                    Try On</span>
            </div>
            <div
                class="flex flex-col justify-center items-center bg-white-300 rounded-lg border border-gray-400 shadow-md p-8 m-2 w-full md:w-1/2 lg:w-1/3 hover:shadow-lg transition-all">
                <i class="fa-solid fa-star text-orange-500"></i>
                <span class="text-gray-700 font-medium text-sm text-center mt-2 overflow-hidden break-words">Tersedia
                    Beberapa Jenis Batik</span>
            </div>
            <div
                class="flex flex-col justify-center items-center bg-white-300 rounded-lg border border-gray-400 shadow-md p-8 m-2 w-full md:w-1/2 lg:w-1/3 hover:shadow-lg transition-all">
                <i class="fa-solid fa-money-bill text-orange-500"></i>
                <span class="text-gray-700 font-medium text-sm text-center mt-2 overflow-hidden break-words">Murah
                    Pastinya</span>
            </div>
        </div>
    </div>
    <!-- END CARD -->
    <!-- PRICING -->
    <div class="bg-gradient-to-b from-white-300 to-white-500 w-full pb-20" id="recommendation">
        <div class="max-w-screen-xl px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-center justify-center">
            <div class="flex flex-col w-full">
                <div>
                    <br>
                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-medium text-black-600 leading-relaxed">
                        Rekomendasi Batik Hari Ini
                    </h3>
                </div>
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 lg:gap-6 py-4 lg:py-6 px-2 sm:px-4 lg:px-6">
                    @foreach ($batiks as $batik)
                        <div class="flex justify-center">
                            <div
                                class="flex flex-col justify-center items-center border bg-white border-gray-500 rounded-xl py-2 px-4 hover:shadow-lg relative w-full sm:w-[50%] md:w-[33.3333%] lg:w-[70%]">
                                
                                <p class="text-base text-black font-medium capitalize">
                                    {{ $batik->name }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @php
                                            $user = $users->where('uuid', $batik->uuid_user)->first();
                                        @endphp
                                        <a class="text-xs text-orange-500 hover:text-orange-700" href="/store/{{ $batik->uuid_user }}">
                                                    {{ $user ? $user->store_name : 'Store Name Not Available' }}
                                        </a>
                                    </div>
                                </div>
                                <div class="my-5">
                                    <img src="{{ asset('storage/catalog_picture/' . $batik->catalog_picture) }}"
                                        class="w-25 h-25 object-cover rounded-md" alt="{{ $batik->name }}" />
                                </div>
                                <div class="flex justify-center space-x-2">
                                    <button class="w-8 h-8 rounded-full bg-blue-500 hover:bg-blue-700 text-white"
                                        data-modal-target="defaultModal{{ $batik->uuid }}"
                                        data-modal-toggle="defaultModal{{ $batik->uuid }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>
                                    <a href="{{ route('user.camera', $batik->uuid) }}">
                                        <button class="w-10 h-10 rounded-full bg-orange-500 hover:bg-orange-700 text-white">
                                            <i class="fa-solid fa-camera"></i>
                                        </button>
                                    </a>
                                    <a href="{{ $batik->product_url }}">
                                        <button class="w-8 h-8 rounded-full bg-green-500 hover:bg-green-700 text-white">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <!-- MODAL -->
                        <div id="defaultModal{{ $batik->uuid }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            {{ $batik->name }}
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="defaultModal{{ $batik->uuid }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <div class="p-6 space-y-6">
                                        <div class="relative">
                                            <img src="{{ asset('storage/catalog_picture/' . $batik->catalog_picture) }}"
                                                class="w-52 mx-auto rounded-md">
                                        </div>
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            {{ $batik->category->description }}
                                        </p>
                                    </div>
                                    <div class="p-4 flex items-center justify-between">
                                        <div class="flex items-center">
                                            @php
                                                $user = $users->where('uuid', $batik->uuid_user)->first();
                                            @endphp
                                            <img src="{{ asset('storage/profile/' . $user->image) }}"
                                                class="w-12 h-12 rounded-full border-2 border-white">
                                            @php
                                                $user = $users->where('uuid', $batik->uuid_user)->first();
                                            @endphp
                                            <a href="/store/{{ $batik->uuid_user }}"><strong
                                                    class="ml-2 hover:text-gray-500">
                                                    {{ $user ? $user->store_name : 'Store Name Not Available' }}
                                                </strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL -->
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a class="mbpy-3 w-64 py-4 lg:py-4 px-12 lg:px-16 text-white font-semibold rounded-lg bg-orange-500 hover:shadow-orange-md transition-all outline-none"
                        href="/search">
                        Lihat lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ENDPRICING -->
@endsection
