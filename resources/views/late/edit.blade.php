<x-layout>
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Edit Data Keterlambatan</h1>
        <div class="space-x-2">
            <a href="/" class="dark:text-blue-500 text-sm text-gray-400 hover:underline">Home</a>
            <span class="dark:text-gray-400 text-sm text-gray-400">/</span>
            <a href="{{ route('late.index') }}" class="dark:text-blue-500 text-sm text-gray-400 hover:underline">Data
                Keterlambatan</a>
            <span class="dark:text-gray-400 text-sm text-gray-400">/</span>
            <span class="dark:text-gray-400 text-sm text-gray-600">Edit Data Keterlambatan</span>
        </div>
    </x-slot:header>

    <div class="space-y-5 rounded bg-white p-5">
        <form action="{{ route('late.update', $late->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="student_id"
                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Siswa</label>
                <select name="student_id" class="select2 w-full rounded border-gray-300">
                    <option selected disabled>Pilih Siswa</option>
                    @foreach ($students as $item)
                        <option @selected(old('student_id', $late->student_id) == $item->id) value="{{ $item->id }}">
                            {{ $item->nis . ' - ' . $item->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>

            {{-- date_time_late --}}
            <div class="mb-6">
                <label for="date_time_late" class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Tanggal
                    Keterlambatan</label>
                <input type="datetime-local" id="date_time_late" name="date_time_late"
                    class="w-full rounded border-gray-300"
                    value="{{ old('date_time_late', \Carbon\Carbon::parse($late->date_time_late)->format('Y-m-d\TH:i')) }}">
                <x-input-error :messages="$errors->get('date_time_late')" class="mt-2" />
            </div>

            <div class="mb-6">
                <label for="information"
                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Keterangan</label>
                <textarea name="information" id="information" class="w-full rounded border-gray-300">{{ old('information', $late->information) }}</textarea>
                <x-input-error :messages="$errors->get('information')" class="mt-2" />
            </div>

            <div class="mb-6">
                <label class="dark:text-white mb-2 block text-sm font-medium text-gray-900" for="bukti">Bukti</label>
                <input
                    class="dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none"
                    id="bukti" name="bukti" type="file">
                <p class="dark:text-gray-300 mt-1 text-sm text-gray-500">PNG, JPG, JPEG (MAX. 2MB).</p>
                <x-input-error :messages="$errors->get('bukti')" class="mt-2" />

                @if ($late->bukti)
                    <p class="dark:text-gray-300 mb-0 mt-1 text-sm text-gray-500">Bukti sebelumnya</p>
                    <img src="{{ asset('storage/' . $late->bukti) }}" alt="Bukti" class="mt-1" width="200">
                @endif
            </div>

            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Perbarui</button>
        </form>
    </div>


</x-layout>
