<!-- FOOTER -->
<div class="hidden lg:flex bg-white-300 pt-8 pb-6">
  <div class="max-w-screen-xl w-full mx-auto px-6 sm:px-8 lg:px-16 grid grid-rows-6 sm:grid-rows-1 grid-flow-row sm:grid-flow-col grid-cols-3 sm:grid-cols-12 gap-4">
    <div class="row-span-2 sm:col-span-4 col-start-1 col-end-4 sm:col-end-5 flex flex-col items-start ">
      <img src="/assets/logosidetext.png" class="w-40" />
      <p class="mb-4">
        <strong class="font-medium">jARict</strong> adalah singkatan dari Javanese Augmented Reality in Computational Try ON
      </p>
      <div class="flex w-full mt-2 mb-8 -mx-2">
        <div class="mx-2 bg-white-500 rounded-full items-center justify-center flex p-2 shadow-md">
          <a href="https://www.facebook.com/hmti.udinus"><img src="/assets/Icon/facebook.svg" class="h-6 w-6" /></a>
        </div>
        <div class="mx-2 bg-white-500 rounded-full items-center justify-center flex p-2 shadow-md">
          <a href="https://twitter.com/hmtiudinus"><img src="/assets/Icon/twitter.svg" class="h-6 w-6" /></a>
        </div>
        <div class="mx-2 bg-white-500 rounded-full items-center justify-center flex p-2 shadow-md">
          <a href="https://www.instagram.com/hmtiudinus/"><img src="/assets/Icon/instagram.svg" class="h-6 w-6" /></a>
        </div>
        <div class="mx-2 bg-white-500 rounded-full items-center justify-center flex p-2 shadow-md">
          <a href="https://hmtiudinus.org/"><img src="/assets/Icon/web.svg" class="h-6 w-6" /></a>
        </div>
      </div>
      <p class="text-gray-400">
        <span>© Copyright HM-TI UDINUS. All rights reserved.</span>
      </p>
    </div>
    <div class=" row-span-2 sm:col-span-2 sm:col-start-7 sm:col-end-9 flex flex-col">
      <p class="text-black-600 mb-4 font-medium text-lg">Home</p>
      <ul class="text-black-500">
        <li class="my-2 {{ Request::is('/') ? 'text-orange-500' : 'hover:text-orange-500' }} cursor-pointer transition-all">
          <a href="/">Beranda</a>
        </li>
      </ul>
    </div>
    <div class="row-span-2 sm:col-span-2 sm:col-start-9 sm:col-end-11 flex flex-col">
      <p class="text-black-600 mb-4 font-medium text-lg">Product</p>
      <ul class="text-black-500">
        <li class="my-2 {{ Request::is('search') ? 'text-orange-500' : 'hover:text-orange-500' }} cursor-pointer transition-all">
          <a href="/search">Cari</a>
        </li>
      </ul>
    </div>
    <div class="row-span-2 sm:col-span-2 sm:col-start-11 sm:col-end-13 flex flex-col">
      <p class="text-black-600 mb-4 font-medium text-lg">About</p>
      <ul class="text-black-500">
        <li class="my-2 {{ Request::is('about') ? 'text-orange-500' : 'hover:text-orange-500' }} cursor-pointer transition-all">
          <a href="/about">Tentang</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- ENDFOOTER -->
