@extends('dashboard/components/layout')

@section('content')
    <!-- PROFILE -->
    <div class="w-full relative" style="padding-top: 5rem;">
        <div class="bg-cover bg-center h-44" style="background-image: url('/assets/batik.png');">
            <div class="w-16 h-16 rounded-full border-2 border-black overflow-hidden absolute left-6" style="top: 13rem;">
                <img src="{{ asset('storage/profile/' . Auth::user()->image) }}" alt="Shop Logo"
                    class="w-full h-full object-cover rounded-full">
            </div>
        </div>
        <div class="bg-white shadow-md p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="ml-4">
                        <h1 class="text-xl font-semibold">{{ Auth::user()->store_name }}</h1>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="/dashboard/profileDetail" class="rounded-md text-xs sm:text-sm px-5 py-2.5 text-white"
                        style="background: #2FAB73">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROFILE -->
    <!-- CATALOG -->
    <div class="w-full pt-8">
        <div class="max-w-screen-xl px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-center justify-center">
            <div class="flex flex-col w-full">
                <div class="flex justify-start sm:justify-center">
                    <h3 class="text-2xl sm:text-2xl lg:text-3xl font-medium text-white leading-relaxed">
                        Katalog
                    </h3>
                </div>
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 lg:gap-6 py-4 lg:py-6 px-2 sm:px-4 lg:px-6">
                    @foreach (Auth::user()->batiks as $batik)
                        <div class="flex justify-center">
                            <div
                                class="flex flex-col justify-center items-center border border-gray-500 rounded-md py-2 px-4 hover:shadow-lg relative">
                                <p class="text-base text-white font-medium capitalize">
                                    {{ $batik->name }}
                                </p>
                                <div class="p-2 my-2">
                                    <img src="{{ asset('storage/catalog_picture/' . $batik->catalog_picture) }}"
                                        width="100" height="120" />
                                </div>
                                <div class="flex space-x-2">
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
                        <!-- Modal -->
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
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
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
                                                class="w-52 mx-auto" >
                                        </div>
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            {{ $batik->category->description }}
                                        </p>
                                    </div>
                                    <div class="p-4 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/profile/' . Auth::user()->image) }}"
                                                class="w-12 h-12 rounded-full border-2 border-white" alt="Shopee Logo">
                                            <strong class="ml-2">{{ Auth::user()->store_name }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END CATALOG -->
@endsection
