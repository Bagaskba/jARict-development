<header class="fixed top-0 w-full z-30 transition-all shadow-md pt-0" style="background: #121212">
  <nav class="w-full max-w-screen-xl px-6 sm:px-8 lg:px-16 mx-auto grid grid-flow-col ">
    <div class="col-start-1 col-end-2 flex items-center">
      <img src="/assets/logo.png" class="w-20" />
      <strong class="text-3xl text-white">{{ $pageTitle }}</strong>
    </div>
    <ul class="hidden lg:flex col-start-4 col-end-8 text-black-500 items-center pr-44">
      <a class="px-4 py-2 mx-2 cursor-pointer animation-hover inline-block relative text-white hover:text-orange-500" href="/dashboard/">
        Beranda
      </a>
      <a class="px-4 py-2 mx-2 cursor-pointer animation-hover inline-block relative text-white hover:text-orange-500" href="/dashboard/profile">
        Profile
      </a>
      <a class="px-4 py-2 mx-2 cursor-pointer inline-block relative text-red-500" href="/logout">
        Logout
      </a>
    </ul>
  </nav>
</header>
<nav class="fixed lg:hidden bottom-0 left-0 right-0 z-20 px-4 sm:px-8 shadow-t" style="background: #121212">
  <div class="sm:px-3">
    <ul class="flex w-full justify-between items-center text-white">
      <a class="mx-1 sm:mx-2 px-3 sm:px-4 flex flex-col items-center text-xs border-t-2 transition-all border-transparent cursor-pointer hover:text-orange-500" href="/dashboard/">
        <i class="fa-solid fa-house text-lg"></i>
        Beranda
      </a>
      <a class="mx-1 sm:mx-2 px-3 sm:px-4 py-2 flex flex-col items-center text-xs border-t-2 transition-all border-transparent cursor-pointer hover:text-orange-500" href="/dashboard/profile">
        <i class="fa-sharp fa-solid fa-user text-lg"></i>
        Profile
      </a>
      <a class="mx-1 sm:mx-2 px-3 sm:px-4 py-2 flex flex-col items-center text-xs border-t-2 transition-all border-transparent cursor-pointer text-red-500" href="/logout">
        <i class="fa-solid fa-right-from-bracket text-lg"></i>
        Logout
      </a>
    </ul>
  </div>
</nav>