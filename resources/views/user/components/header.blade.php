<header class="z-30 fixed top-0 w-full z-30 bg-white-500 transition-all shadow-md pt-0">
  <nav class="px-4 max-w-screen-xl sm:px-8 lg:px-16 mx-auto grid grid-flow-col">
    <div class="col-start-1 col-end-2 flex items-center">
      <img src="/assets/logosidetext.png" class="w-32" />
    </div>
    <ul class="hidden lg:flex col-start-4 col-end-8 text-black-500 items-center">
      <a class="px-4 py-2 mx-2 cursor-pointer animation-hover inline-block relative {{ request()->is('/') ? 'text-orange-500' : 'text-black-500' }} hover:text-orange-500" href="/">
        Beranda
      </a>
      <a class="px-4 py-2 mx-2 cursor-pointer animation-hover inline-block relative {{ request()->is('search') ? 'text-orange-500' : 'text-black-500' }} hover:text-orange-500" href="/search">
        Cari
      </a>
      <a class="px-4 py-2 mx-2 cursor-pointer animation-hover inline-block relative {{ request()->is('about') ? 'text-orange-500' : 'text-black-500' }} hover:text-orange-500" href="/about">
        Tentang
      </a>
    </ul>
  </nav>
</header>
<nav class="z-30 fixed lg:hidden bg-white-500 bottom-0 left-0 right-0 z-20 px-4 sm:px-8 shadow-t">
  <div class="sm:px-3">
    <ul class="flex w-full justify-between items-center text-black-500">
      <a class="mx-1 sm:mx-2 px-3 sm:px-4 flex flex-col items-center text-xs border-t-2 transition-all border-transparent cursor-pointer {{ request()->is('/') ? 'text-orange-500' : 'text-black-500' }} hover:text-orange-500" href="/">
        <i class="fa-solid fa-house text-lg"></i>
        Beranda
      </a>
      <a class="mx-1 sm:mx-2 px-3 sm:px-4 py-2 flex flex-col items-center text-xs border-t-2 transition-all border-transparent cursor-pointer {{ request()->is('search') ? 'text-orange-500' : 'text-black-500' }} hover:text-orange-500" href="/search">
        <i class="fa-solid fa-magnifying-glass text-lg"></i>
        Cari
      </a>
      <a class="mx-1 sm:mx-2 px-3 sm:px-4 py-2 flex flex-col items-center text-xs border-t-2 transition-all border-transparent cursor-pointer {{ request()->is('about') ? 'text-orange-500' : 'text-black-500' }} hover:text-orange-500" href="/about">
        <i class="fa-solid fa-circle-info text-lg"></i>
        Tentang
      </a>
    </ul>
  </div>
</nav>
