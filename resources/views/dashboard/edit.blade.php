@extends('dashboard/components/layout')

@section('content')
    <!-- FORM -->
    <div class=" w-full">
        <div
            class="max-w-screen-md pt-24 px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-left sm:text-left lg:text-center justify-center">
            <form action="{{ route('dashboard.update', ['uuid' => $batiks->uuid]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-white">Nama Batik</label>
                    <input type="text" id="name" name="name" value="{{ $batiks->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="mb-6">
                    <label for="uuid_category" class="block mb-2 text-sm font-medium text-white">Kategori Batik</label>
                    <select id="uuid_category" name="uuid_category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->uuid }}"
                                {{ $category->uuid === $batiks->uuid_category ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-white">Link Pembelian</label>
                    <input type="text" id="product_url" name="product_url" value="{{ $batiks->product_url }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="catalog_picture" class="block mb-2 text-sm font-medium text-white">Foto Katalog Saat
                            ini</label>
                        <img class="w-40 mx-auto" id="catalogPictureNow" src="{{ asset('storage/catalog_picture/' . $batiks->catalog_picture) }}">
                    </div>
                    <div>
                        <label for="catalog_picture" class="block mb-2 text-sm font-medium text-white">Foto Katalog</label>
                        <div class="flex mb-6 items-center justify-center w-full">
                            <label for="catalog_picture"
                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-transparent">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                            Upload</span> atau drag & drop</p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPEG, JPG atau GIF (MAX. 9999x9999px)</p>
                                </div>
                                <input id="catalog_picture" name="catalog_picture" type="file" class="hidden getChange" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="motive_picture" class="block mb-2 text-sm font-medium text-white">Foto Motif Saat
                            ini</label>
                        <img class="w-40 mx-auto" id="motivePictureNow" src="{{ asset('storage/motive_picture/' . $batiks->motive_picture) }}">
                    </div>
                    <div>
                        <label for="motive_picture" class="block mb-2 text-sm font-medium text-white">Foto Motif</label>
                        <div class="flex mb-6 items-center justify-center w-full">
                            <label for="motive_picture"
                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-transparent">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                            Upload</span> atau drag & drop</p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPEG, JPG atau GIF (MAX. 9999x9999px)</p>
                                </div>
                                <input id="motive_picture" name="motive_picture" type="file" class="hidden getChangeMotive" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center sm:justify-between mb-6">
                    <a data-modal-target="delete-modal{{ $batiks->uuid }}"
                        data-modal-toggle="delete-modal{{ $batiks->uuid }}" data-uuid="{{ $batiks->uuid }}"
                        class="text-white focus:outline-none focus:ring-4 hvr focus:ring-green-300 font-medium rounded-md text-xs sm:text-sm px-5 py-2.5 mr-2 mb-2 text-center sm:mb-0"
                        style="background-color: rgb(224 36 36);">Hapus</a>
                    <input type="submit"
                        class="text-white bg-green-500 hover:bg-green-800 font-medium rounded-md text-xs sm:text-sm px-5 py-2.5 mr-2 mb-2 text-center sm:mb-0"
                        value="Edit" style="background: rgb(4 108 78 / var(--tw-bg-opacity));">
                </div>
            </form>
            <div id="delete-modal{{ $batiks->uuid }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="delete-modal{{ $batiks->uuid }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin
                                        ingin menghapus <b>{{ $batiks->name }}</b> ini?</h3>
                                    <form action="{{ route('batik.delete', ['uuid' => $batiks->uuid]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-700 text-white hover:bg-red-700 hover:text-black font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                                            style="background: rgb(200 30 30 / var(--tw-bg-opacity));">Ya,
                                            Saya Yakin</button>
                                    </form>
                                    <button data-modal-hide="delete-modal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                        Batalkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <!-- END FORM -->
@endsection
