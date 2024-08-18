@extends('superadmin/components/layout')

@section('content')
    <div class="p-4 sm:ml-44 mt-20">
        <div class="flex justify-between mb-4">
            <a href="/superadmin/create"
                class="bg-green-500 text-white outline-none capitalize hover:bg-green-900 hover:text-white transition-all hover:shadow-yellow rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                Akun</a>
            <form method="GET" action="{{ route('superadmin.search') }}">
                <div class="relative">
                    <input type="search" name="search"
                        class="block w-40 p-2 pl-8 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="Cari...">
                </div>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Password
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Toko
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Profile
                        </th>
                        @if (auth()->user()->email == 'developer@jarictku.com')
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->role == 2 || (auth()->user()->email == 'developer@jarictku.com' && $user->role == 1))
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $user->username }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->password }}
                                </td>
                                <td scope="row" class="px-6 py-4">
                                    @if ($user->store_name)
                                        {{ $user->store_name }}
                                    @else
                                        <span class="text-red-500">Tidak Ada Nama Toko, karena akun Admin</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($user->image)
                                        <img class="w-[200px]" src="{{ asset('storage/profile/' . $user->image) }}" alt="Foto Pengguna">
                                    @else
                                        Tidak Ada Foto Profile
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($user->role == 1)
                                        Superadmin
                                    @elseif($user->role == 2)
                                        Toko
                                    @else
                                        Undefined
                                    @endif
                                </td>
                                @if (auth()->user()->email == 'developer@jarictku.com')
                                    <td class="px-6 py-4">
                                        <a href="{{ route('user.edit', ['uuid' => $user->uuid]) }}"
                                            class=" bg-yellow-300 text-black outline-none  capitalize hover:bg-yellow-500 hover:text-white transition-all hover:shadow-yellow rounded-lg text-sm px-5 py-2.5 text-center mr-2">EDIT</a>
                                        <br>
                                        <br>
                                        <a data-modal-target="delete-modal{{ $user->uuid }}"
                                            data-modal-toggle="delete-modal{{ $user->uuid }}"
                                            data-uuid="{{ $user->uuid }}"
                                            class="bg-red-700 text-white outline-none capitalize hover:bg-red-900 hover:text-white transition-all hover:shadow-red rounded-lg text-sm px-5 py-2.5 text-center">Hapus</a>
                                    </td>
                                @endif
                            </tr>
                            @if (auth()->user()->email == 'developer@jarictku.com')
                                <div id="delete-modal{{ $user->uuid }}" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                                data-modal-hide="delete-modal{{ $user->uuid }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda Yakin
                                                    menghapus
                                                    akun
                                                    <b>{{ $user->username }}</b> ?
                                                </h3>
                                                <form action="{{ route('user.delete', ['uuid' => $user->uuid]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-700 text-white hover:bg-red-700 hover:text-black font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                                                        style="background: rgb(200 30 30 / var(--tw-bg-opacity));">Ya,
                                                        Saya Yakin</button>
                                                </form>
                                                <button data-modal-hide="delete-modal{{ $user->uuid }}" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak
                                                    Batalkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
