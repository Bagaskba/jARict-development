@extends('dashboard/components/layout')

@section('content')
    <div data-dial-init class="fixed right-6 bottom-24 group sm:right-12">
        <a href="/dashboard/add"
            class="flex items-center justify-center text-white bg-green-500 rounded-full w-14 h-14 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 1v16M1 9h16" />
            </svg>
        </a>
    </div>
    <!-- BATIK -->
    <div class="w-full">
        <div class="max-w-screen-xl pt-24 px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-center justify-center">
            <div class="flex flex-col w-full">
                <h1 class="text-white font-bold text-2xl">Halo Toko {{ Auth::user()->store_name }}. Selamat datang di dashboard!</h1>
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 lg:gap-6 py-4 lg:py-6 px-2 sm:px-4 lg:px-6">
                    @foreach (Auth::user()->batiks as $batik)
                        <div class="flex justify-center">
                            <div
                                class="flex flex-col justify-center items-center border border-gray-500 rounded-md py-2 px-4 hover:shadow-lg">
                                <p class="text-base text-white font-medium capitalize">
                                    {{ $batik->name }}
                                </p>
                                <div class="p-2 my-2">
                                    <img src="{{ asset('storage/catalog_picture/' . $batik->catalog_picture) }}"
                                        width="100" height="120" />
                                </div>
                                <div class="flex justify-center">
                                    <a href="{{ route('dashboard.edit', ['uuid' => $batik->uuid]) }}"
                                        class="font-medium py-1 px-3 border border-orange-500 text-black bg-white outline-none rounded-l-full rounded-r-full capitalize hover:bg-black hover:text-white transition-all hover:shadow-orange">
                                        <i class="fa-solid fa-pen "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END BATIK -->
@endsection
