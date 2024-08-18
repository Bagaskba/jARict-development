@extends('user/components/layout')

@section('content')
  @include('user/components/carousel')
  <!-- ABOUT VILLAGE -->
  <div class="bg-white-300 w-full py-8">
    <div class="max-w-screen-xl px-6 sm:px-8 lg:px-16 mx-auto flex flex-col w-full text-justify">
      <h1 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl text-center">Tentang Kampung Batik Rejomulyo</h1>
      <p class="mb-3 text-gray-500 dark:text-gray-400">
        <span class="uppercase tracking-widest font-bold text-6xl text-gray-900 dark:text-gray-100 mr-3 float-left">K</span>ampung Rejomulyo dipilih sebagai salah satu kampung tematik batik oleh Walikota Semarang yang tertuang pada
         Peraturan Walikota Semarang No 22 Tahun 2018. Menurut data dari Badan Pusat Statistik Kota Semarang tahun terbit 2021, Kampung Batik Rejomulyo terletak di Kelurahan Rejomulyo yang memiliki luas 37.065 hektar dengan jumlah penduduk 
         sebanyak 3.810 orang. Lebih dari 80% mata pencaharian penduduk di Kelurahan Rejomulyo adalah wirausaha dan sebagian besar merupakan pengrajin dan pemilik toko batik. Oleh karena itu, batik menjadi profil utama dari Kelurahan Rejomulyo.
          Kelurahan Rejomulyo sendiri telah menjadi desa binaan dari Universitas Dian Nuswantoro, khususnya Fakultas Ilmu Komputer sejak 1 Desember 2022 dengan kegiatan unggulan bertajuk “Fashion Show Ragam Sejarah Nusantara” yang didokumentasikan pada
        <a class="text-blue-400 hover:text-blue-600" href="https://instagram.com/ragamsejarahnusantara">ragamsejarah</a>.
      </p>
    </div>
  </div>
  <!-- END ABOUT VILLAGE -->
  <!-- GMAPS -->
    <div class="m-0 mx-auto flex justify-center">
      <div class="relative w-full h-0" style="padding-bottom: 50%;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3404019420086!2d110.42885381081429!3d-6.96910856820976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f35a6fffffff%3A0x7a79d96ff0941faf!2sKampung%20Batik!5e0!3m2!1sid!2sid!4v1688464117928!5m2!1sid!2sid" 
                class="absolute top-0 left-0 right-0 w-full h-full" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  <!-- END GMAPS -->
@endsection