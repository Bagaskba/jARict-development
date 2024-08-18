@extends('user/components/layout')

@section('content')
    <!-- PROFILE -->
    <div class="p-4 max-w-6xl mx-auto relative" style="padding-top: 8.2rem;">
        <div class="bg-cover bg-center h-44" style="background-image: url('/assets/batik.png');">
            <div class="w-16 h-16 rounded-full border-2 border-black overflow-hidden absolute left-6" style="top: 16.2rem;">
                @php
                    $batik = $batiks->first();
                    if ($batik) {
                        $user = $users->where('uuid', request()->route('uuid'))->first();
                    }
                @endphp
                @if ($user)
                    <img src="{{ asset('storage/profile/' . $user->image) }}" class="w-full h-full object-cover rounded-full">
                @endif
            </div>
        </div>
        <div class="bg-white shadow-md p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="ml-4">
                        @if ($user)
                            <h1 class="text-xl font-semibold">Toko {{ $user->store_name }}</h1>
                        @else
                            <h1 class="text-xl font-semibold">Toko Name Not Available</h1>
                        @endif
                        {{-- <a href="https://shopee.co.id/" class="text-sm text-gray-500 hover:text-black hover:underline">
                            <i class="fa-sharp fa-solid fa-bag-shopping"></i>Link Pembelian
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROFILE -->
    <!-- KATALOG -->

    <div class="w-full">
        <div class="max-w-screen-xl px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-center justify-center">
            <div class="flex flex-col w-full">
                <div class="flex justify-start sm:justify-center">
                    <h3 class="text-2xl sm:text-2xl lg:text-3xl font-medium text-white leading-relaxed">
                        Katalog
                    </h3>
                </div>
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 lg:gap-6 py-4 lg:py-6 px-2 sm:px-4 lg:px-6">
                    @foreach ($batiks as $batik)
                        @if ($batik->uuid_user == $user->uuid)
                            <div class="flex justify-center">
                                <div
                                    class="flex flex-col justify-center items-center border bg-white border-gray-500 rounded-xl py-2 px-4 hover:shadow-lg relative w-full sm:w-[50%] md:w-[33.3333%] lg:w-[70%]">

                                    <p class="text-base text-black font-medium capitalize">
                                        {{ $batik->name }}
                                    </p>
                                    <div class="my-2">
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
                                            <button
                                                class="w-10 h-10 rounded-full bg-orange-500 hover:bg-orange-700 text-white">
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
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- END KATALOG -->
@endsection
