@extends('superadmin/components/layout')

@section('content')
    <div class="p-4 sm:ml-64 mt-16">
        <div class=" w-full">
            <div class="max-w-screen-md pt-24 px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-left justify-center">
                <h1 class="font-bold py-4 text-center">Tambah Kategori</h1>
                <form method="POST" action="{{ route('storeCategory') }}">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Nama Kategori</label>
                        <input type="text" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Deskripsi</label>
                        <textarea type="text" name="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                    </div>
                    <div class="flex flex-wrap justify-center sm:justify-between mb-6">
                        <a href="/superadmin/category"
                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-md text-xs sm:text-sm px-1.5 py-1 sm:px-2 sm:py-1.5 text-center mr-2 mb-2 sm:mb-0">Batal</a>
                        <input type="submit"
                            class="text-white bg-green-500 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-md text-xs sm:text-sm px-1.5 py-1 sm:px-2 sm:py-1.5 text-center mr-2 mb-2 sm:mb-0"
                            style="background-color: rgb(14 159 110 / var(--tw-bg-opacity));" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
