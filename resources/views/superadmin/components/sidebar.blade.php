<!-- NAVBAR -->
<nav id="navbar" class="fixed top-0 z-40 flex w-full flex-row justify-end bg-orange-500 px-4 sm:justify-between">
    <img class="w-40 pl-10" src="/assets/logosidetext.png">
    <button id="btnSidebarToggler" type="button" class="py-4 text-2xl text-white hover:text-gray-200">
        <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="h-8 w-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="hidden h-8 w-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</nav>
<!-- NAVBAR END -->

<!-- SIDEBAR -->
<div id="containerSidebar" class="z-40">
    <div class="navbar-menu relative z-40">
        <nav id="sidebar"
            class="fixed left-0 bottom-0 flex w-3/4 -translate-x-full flex-col bg-orange-500 pt-6 pb-8 sm:max-w-xs lg:w-80">
            <div class="px-4 pb-20">
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-orange-700"
                            href="/superadmin/"><i class="fa-solid fa-house pr-2"></i>
                            <span class="select-none">Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-orange-700"
                            href="/superadmin/controlUser"><i class="fa-solid fa-users pr-2"></i>
                            <span class="select-none">Kelola Akun</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-orange-700"
                            href="/superadmin/category"><i class="fa-solid fa-list"></i>
                            <span class="select-none pl-2">Kelola Kategori</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="px-4 pt-64 lg:pt-48">
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-white hover:bg-orange-700"
                            href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket pr-2"></i>
                            <span class="select-none">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="mx-auto lg:ml-80"></div>
</div>
<!-- SIDEBAR END -->