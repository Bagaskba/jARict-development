@extends('user/components/layout')

@section('content')
    <!-- SEARCH -->
    <div class="bg-gradient-to-b from-white-300 to-white-500 w-full my-24">
        <div class="max-w-screen-xl px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-center justify-center">
            <form action="{{ route('search') }}" method="GET">
                <div class="flex">
                    <label for="dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"></label>
                    <div class="z-10">
                        <select id="dropdown" name="category"
                            class="block py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            required>
                            <option selected disabled>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" name="keyword"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Cari">
                        <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-black hover:bg-blue-500 hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
            <!-- END SEARCH -->
            <!-- PRICING -->
            <div class="flex flex-col w-full">
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
            </div>
        </div>
    </div>
    <!-- ENDPRICING -->
@endsection
