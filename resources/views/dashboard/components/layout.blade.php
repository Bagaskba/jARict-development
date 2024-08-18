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
</head>

<body style="background: #232323">
    @include('dashboard/components/header')
    @yield('content')
    @include('dashboard/components/footer')
    <div class="loader" id="loader">
        <img src="/assets/loader.gif">
    </div>
    <script src="/assets/js/loader.js"></script>
    <script src="/assets/js/addImage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('delete'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if ($message = Session::get('store'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if ($message = Session::get('update'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if ($message = Session::get('updateAccSuccess'))
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
