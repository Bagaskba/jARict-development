<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jARict</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap"
        rel="stylesheet" />
    <!-- ICON -->
    <link rel="icon" href="/assets/logo.png" type="image/x-icon">
    <!-- TW CSS -->
    <link rel="stylesheet" href="/assets/css/tailwind.output.css">
    <!-- lOADER CSS -->
    <link rel="stylesheet" href="/assets/css/loader.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        ul.breadcrumb li+li::before {
            content: "\276F";
            padding-left: 8px;
            padding-right: 4px;
            color: inherit;
        }

        ul.breadcrumb li span {
            opacity: 60%;
        }

        #sidebar {
            -webkit-transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
            transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
        }

        #sidebar.show {
            transform: translateX(0);
        }

        #sidebar ul li a.active {
            background: rgb(180 52 3);
            background-color: rgb(180 52 3);
        }
    </style>
</head>

<body>
    @include('superadmin/components/sidebar')
    @yield('content')
    <div class="loader" id="loader">
        <img src="/assets/loader.gif">
    </div>
    <script src="/assets/js/loader.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const navbar = document.getElementById("navbar");
            const sidebar = document.getElementById("sidebar");
            const btnSidebarToggler = document.getElementById("btnSidebarToggler");
            const navClosed = document.getElementById("navClosed");
            const navOpen = document.getElementById("navOpen");

            btnSidebarToggler.addEventListener("click", (e) => {
                e.preventDefault();
                sidebar.classList.toggle("show");
                navClosed.classList.toggle("hidden");
                navOpen.classList.toggle("hidden");
            });

            sidebar.style.top = parseInt(navbar.clientHeight) - 1 + "px";
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.1/lottie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/preloader.js"></script>
    <script src="/assets/animation_llc4sf8s.json"></script>
    @if($message = Session::get('deleteSucces'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if($message = Session::get('storeSucces'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if($message = Session::get('updateSucces'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if($message = Session::get('categoryUpdateSucces'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if($message = Session::get('categoryDeleteSucces'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if($message = Session::get('categoryStoreSucces'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
</body>

</html>
