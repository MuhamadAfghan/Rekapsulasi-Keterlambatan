<x-layout>
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0"> --}}
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Data Keterlambatan</h1>
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Data Keterlambatan</span>
        </div>
    </x-slot:header>

    <div class="p-5 bg-white rounded">
        <div class="sm:space-x-2 max-sm:space-y-2">
            @if (auth()->user()->role == 'admin')
                <a href="{{ route('late.create') }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded max-sm:block hover:bg-blue-700">Tambah</a>
            @endif
            <a href="{{ route('late.export-excel') }}"
                class="px-4 py-2 text-white rounded max-sm:block bg-cyan-500 hover:bg-cyan-700">Export Data
                Keterlambatan</a>
        </div>

        <div class="mt-5">
            <div id="example_wrapper" style="width: 100%" class="dataTables_wrapper dt-bootstrap4">
                <table id="example1" style="width: 100%" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tgl. Keterlambatan</th>
                            <th>Keterangan</th>
                            @if (auth()->user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lates as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->student->nis }}</td>
                                <td>{{ $item->student->name }}</td>
                                <td>{{ $item->date_time_late->format('d-m-Y H:i') }}
                                </td>
                                <td>{{ $item->information }}</td>
                                @if (auth()->user()->role == 'admin')
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('late.edit', $item->id) }}"
                                                class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Edit</a>
                                            <form action="{{ route('late.destroy', $item->id) }}" method="POST"
                                                id="delete-data-keterlambatan-{{ $item->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button"
                                                    onclick="confirm('Anda yakin ingin menghapus data ini?', '', 'delete-data-keterlambatan-{{ $item->id }}')"
                                                    class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>user</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- DataTables  & Plugins -->
    <script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/jszip/jszip.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "paging": true,
                "ordering": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</x-layout>
