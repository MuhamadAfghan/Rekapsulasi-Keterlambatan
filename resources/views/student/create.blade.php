<x-layout>
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Tambah Data Siswa</h1>
        <div class="space-x-2">
            <a href="/" class="dark:text-blue-500 text-sm text-gray-400 hover:underline">Home</a>
            <span class="dark:text-gray-400 text-sm text-gray-400">/</span>
            <a href="{{ route('student.index') }}" class="dark:text-blue-500 text-sm text-gray-400 hover:underline">Data
                Siswa</a>
            <span class="dark:text-gray-400 text-sm text-gray-400">/</span>
            <span class="dark:text-gray-400 text-sm text-gray-600">Tambah Data Siswa</span>
        </div>
    </x-slot:header>

    <div class="space-y-5 rounded bg-white p-5">
        <form action="{{ route('student.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="nis" class="dark:text-white mb-2 block text-sm font-medium text-gray-900">NIS</label>
                <input type="number" id="nis" name="nis" class="w-full rounded border-gray-300"
                    placeholder="nis" value="{{ old('nis') }}">
                <x-input-error :messages="$errors->get('nis')" class="mt-2" />

            </div>

            <div class="mb-6">
                <label for="user" class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Nama</label>
                <input type="text" id="user" name="name" class="w-full rounded border-gray-300"
                    placeholder="nama" value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            <div class="mb-6">
                <label for="rombel_id"
                    class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Rombel</label>
                <select id="rombel_id" name="rombel_id" class="select2 w-full rounded border-gray-300">
                    <option selected disabled>Pilih Rombel</option>
                    @foreach ($rombels as $item)
                        <option @selected(old('rombel_id') == $item->id) value="{{ $item->id }}">{{ $item->rombel }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('rombel_id')" class="mt-2" />

            </div>

            <div class="mb-6">
                <label for="rayon_id" class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Rayon</label>
                <select id="rayon_id" name="rayon_id" class="select2 w-full rounded border-gray-300">
                    <option selected disabled>Pilih Rayon</option>
                    @foreach ($rayons as $item)
                        <option @selected(old('rayon_id') === $item->id) value="{{ $item->id }}">{{ $item->rayon }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('rayon_id')" class="mt-2" />

            </div>

            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Simpan</button>
        </form>
    </div>


</x-layout>
