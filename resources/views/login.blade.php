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
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body style="background: #232323">
    <section class="pt-40 sm:pt-0">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <img class="w-40 mr-2" src="/assets/logosidetext.png" alt="logo">
            <div class="w-full bg-gray-300 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Masuk ke akun Anda
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login-process') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="example@gmail.com">
                        </div>
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                        <input type="submit"
                            class="w-full text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            value="Masuk">
                        @if (Auth::check() && Auth::user()->role == 2)
                            <a class="text-black hover:text-white" href="{{ route('dashboard') }}">
                                <span class="text-black hover:text-white">
                                    Anda Sudah login klik ini untuk kembali
                                </span>
                            </a>
                        @endif
                        @if (Auth::check() && Auth::user()->role == 1)
                            <a class="text-black hover:text-white" href="{{ route('superadmin.index') }}">
                                <span class="text-black hover:text-white">
                                    Anda Sudah login klik ini untuk kembali
                                </span>
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script href="/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login gagal',
                text: '{{ $message }}',
            })
        </script>
    @endif
    @if ($message = Session::get('mustLogin'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login gagal',
                text: '{{ $message }}',
            })
        </script>
    @endif
    @if ($message = Session::get('success'))
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
