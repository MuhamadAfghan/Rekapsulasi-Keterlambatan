<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    {{-- Flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</head>

<body class="min-h-screen px-5 font-sans antialiased "
    style="background-image: linear-gradient(
    rgba(0,0,0,0.6),
    rgba(0,0,0,0.6)
    ),
    url({{ asset('assets/imgs/Gedung.jpg') }}); background-repeat:no-repeat; background-size:cover;">
    <div class="font-[sans-serif] w-full">
        <div
            class="lg:min-h-[calc(100vh-50px)] min-h-screen mx-auto flex justify-center gap-20 items-center flex-col  ">
            <a href="https://smkwikrama.sch.id" target="_blank" class="absolute flex items-center top-5 left-5"><img
                    src="https://smkwikrama.sch.id/assets2/wikrama-logo.png" alt="logo" class='w-10 lg:w-16' />
                <span class="font-semibold text-gray-200 text-">SMK WIKRAMA BOGOR</span>
            </a>
            <div class="text-center">
                <h3 class="text-3xl font-bold text-white">Selamat datang</h3>
                <p class="mt-4 text-sm text-white">Untuk melanjutkan, silahkan login terlebih dahulu</p>
            </div>

            <div
                class="bg-white/90 rounded-xl sm:px-6 px-4 py-8 max-w-md w-full h-max shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] max-lg:mx-auto">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block mb-2 text-sm text-gray-800" for="email">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="email" required id="email"
                                class="w-full px-4 py-3 text-sm text-gray-800 border border-gray-300 rounded-md outline-blue-900"
                                placeholder="Masukkan email" autocomplete="off" value="{{ old('email') }}" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path
                                    d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-sm text-gray-800" for="password">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password" required id="password"
                                class="w-full px-4 py-3 text-sm text-gray-800 border border-gray-300 rounded-md outline-blue-900"
                                placeholder="Masukkan password" autocomplete="off" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                onclick="togglePassword()" class="w-[18px] h-[18px] absolute right-4 cursor-pointer"
                                viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex items-center mt-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" checked
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Ingat saya</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full px-6 py-3 text-sm font-semibold text-white bg-blue-900 rounded-md shadow-xl hover:bg-blue-950 focus:outline-none">
                            Log in
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <footer>
        <p class="font-bold text-center text-gray-300">Copyright &copy; <a href="/dev"
                class="text-blue-600">GEN-19</a>. All rights
            reserved.</p>
    </footer>

    <script>
        @if (session()->has('success'))
            alert('{{ session('success') }}', '', 'success')
        @endif

        @if (session()->has('error'))
            alert('{{ session('error') }}', '', 'error')
        @endif

        @if (session()->has('warning'))
            alert('{{ session('warning') }}', '', 'warning')
        @endif

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
