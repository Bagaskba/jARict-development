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
    <!-- LOADER CSS -->
    <link rel="stylesheet" href="/assets/css/loader.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    video::-webkit-media-controls {
        display: none;
    }

    video::-webkit-media-controls-enclosure {
        display: none;
    }
</style>

<body>
    @include('user/components/header')
    @yield('content')
    @include('user/components/footer')
    <div class="loader" id="loader">
        <img src="/assets/loader.gif">
    </div>
    <script src="/assets/js/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</body>

</html>
