@extends('superadmin/components/layout')

@section('content')
    <div class="p-4 sm:ml-64 mt-16">
        <div class=" w-full">
            <div class="max-w-screen-md pt-24 px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-left justify-center">
                <h1 class="py-4 text-center font-bold">Edit Akun</h1>
                <form method="POST" action="{{ route('user.update', ['uuid' => $users->uuid]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Username</label>
                        <input type="text" name="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $users->username }}">
                        @error('username')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Email</label>
                        <input type="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $users->email }}">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Password</label>
                        <input type="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Password">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Nama Toko</label>
                        <input type="text" name="store_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $users->store_name }}">
                        @error('store_name')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <input name="role" id="role" type="hidden" value="2">
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Foto saat ini</label>
                        @if ($users->image)
                            <img class="w-40" src="{{ asset('storage/profile/' . $users->image) }}" alt="Foto Pengguna">
                        @else
                            <b>Tidak Ada Foto</b>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-black">Edit Foto</label>
                        <input type="file" name="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="">
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
