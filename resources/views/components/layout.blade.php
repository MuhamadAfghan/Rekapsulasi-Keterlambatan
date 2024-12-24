<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>
</head>

<body>
    <x-navbar />

    <x-sidebar />

    <div class="min-h-screen p-5 bg-gray-100 sm:ml-64">
        <div class="mt-14">
            @isset($header)
                <div class="mb-5">
                    {{ $header }}
                </div>
            @endisset
            {{ $slot }}
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <script>
        $('.select2').select2()
    </script>
    <script>
        function alert(title = 'Waduhh', message = '', icon = 'warning') {
            Swal.fire({
                icon: icon,
                title: title,
                text: message,
            });
        }

        function confirm(title = 'Kamu yakin?', message, form_id = null) {
            Swal.fire({
                    title: title,
                    text: message,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!',
                    cancelButtonText: 'Tidak',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        // )
                        document.getElementById(form_id).submit()
                    }
                })
        }

        @if (session()->has('success'))
            alert('{{ session('success') }}', '', 'success')
        @endif

        @if (session()->has('error'))
            alert('{{ session('error') }}', '', 'error')
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
