@extends('superadmin/components/layout')

@section('content')
    <div class="p-4 sm:ml-64 mt-16">
        <div class=" w-full">
            <div class="max-w-screen-md pt-24 px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-left justify-center">
                <h1 class="font-bold py-4 text-center">Tambah Akun</h1>
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Username</label>
                        <input type="text" name="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('username')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Email</label>
                        <input type="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Password</label>
                        <input type="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Nama Toko</label>
                        <input type="text" name="store_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <input name="role" id="role" type="hidden" value="2">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Foto Profil</label>
                        <input type="file" name="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('image')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex flex-wrap justify-center sm:justify-between mb-6">
                        <a href="/superadmin/controlUser"
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
