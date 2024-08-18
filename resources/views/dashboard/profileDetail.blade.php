@extends('dashboard/components/layout')

@section('content')

  <!-- PROFILE -->
  <div class="w-full pt-24">
  <div class="max-w-screen-md px-6 sm:px-8 lg:px-16 mx-auto flex flex-col items-center sm:items-start lg:items-center justify-center">
    <img src="/assets/logo.png" class="w-32 rounded-full border-4 border-black p-1">
  </div>
</div>

  <!-- END PROFILE -->
  <!-- FORM -->
  <div class=" w-full">
    <div class="max-w-screen-md px-6 pt-8 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-left sm:text-left lg:text-center justify-center">
      <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.profileUpdate', ['uuid' => Auth::user()->uuid]) }}">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="store_name" class="block mb-2 text-sm font-medium text-white">Nama Toko</label>
          <input type="text" id="store_name" name="store_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Nama Toko" value="{{ Auth::user()->store_name }}">
        </div>
        <div class="mb-6">
          <label for="username" class="block mb-2 text-sm font-medium text-white">Username</label>
          <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Username" value="{{ Auth::user()->username }}">
        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
          <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Email" value="{{ Auth::user()->email }}">
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
          <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukan Password">
        </div>
        <div class="mb-6">
          <label for="image" class="block mb-2 text-sm font-medium text-white">Foto Profil</label>
          <input type="file" id="image" name="image" class="bg-gray-50 border text-sm rounded-lg   block w-full p-2.5"">
          <label for="image" class="block mb-2 text-sm font-medium text-white">Abaikan jika ingin mengubah foto profil</label>
        </div>

        <div class="flex flex-wrap justify-center sm:justify-between mb-6">
          <a href="/dashboard/profile" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-md text-xs sm:text-sm px-5 py-2.5 mr-2 mb-2 text-center sm:mb-0">Batal</a>
          <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-md text-xs sm:text-sm px-5 py-2.5 mr-2 mb-2 text-center sm:mb-0">Simpan</button>
        </div>
      </form>
    </div>
  </div>
  <!-- END FORM -->
  @endsection