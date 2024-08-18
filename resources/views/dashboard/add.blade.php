@extends('dashboard/components/layout')

@section('content')
    <!-- FORM -->
    <div class=" w-full">
        <div
            class="max-w-screen-md pt-24 px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-left sm:text-left lg:text-center justify-center">
            <form method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-white">Nama Batik</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="uuid_category" class="block mb-2 text-sm font-medium text-white">Jenis Batik</label>
                    <select id="uuid_category" name="uuid_category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('uuid_category')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="product_url" class="block mb-2 text-sm font-medium text-white">Link Pembelian</label>
                    <input type="text" id="product_url" name="product_url"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('product_url')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <label for="catalog_picture" class="block mb-2 text-sm font-medium text-white">Foto Katalog</label>
                <div class="flex mb-6 items-center justify-center w-full">
                    <label for="catalog_picture"
                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-transparen">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk Upload</span> atau
                                drag & drop</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPEG, JPG atau GIF (MAX. 9999x9999px)</p>
                        </div>
                        <input id="catalog_picture" name="catalog_picture" type="file" class="hidden" />
                        @error('catalog_picture')
                            <small>{{ $message }}</small>
                        @enderror
                    </label>
                </div>
                <div class="justify-center grid">
                    <img class="hidden w-96 py-4 " id="displayCatalog">
                </div>
                <label for="motive_picture" class="block mb-2 text-sm font-medium text-white">Foto Motif</label>
                <div class="flex mb-6 items-center justify-center w-full">
                    <label for="motive_picture"
                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-transparen">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk Upload</span> atau
                                drag & drop</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPEG, JPG atau GIF (MAX. 9999x9999px)</p>
                        </div>
                        <input id="motive_picture" name="motive_picture" type="file" class="hidden" />
                        @error('motive_picture')
                            <small>{{ $message }}</small>
                        @enderror
                    </label>
                </div>
                <div class="justify-center grid">
                    <img class="hidden w-96 py-4 " id="displayMotive">
                </div>
                <div class="flex flex-wrap justify-center sm:justify-between mb-6">
                    <a href="/dashboard/"
                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-md text-xs sm:text-sm px-1.5 py-1 sm:px-2 sm:py-1.5 text-center mr-2 mb-2 sm:mb-0">Batal</a>
                    <input type="submit" style="background: rgb(4 108 78 / var(--tw-bg-opacity));"
                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-md text-xs sm:text-sm px-1.5 py-1 sm:px-2 sm:py-1.5 text-center mr-2 mb-2 sm:mb-0"
                        value="Simpan">
                </div>
            </form>
        </div>
    </div>
    <!-- END FORM -->
@endsection
