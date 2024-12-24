<x-layout>
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Edit Data Siswa</h1>
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <a href="{{ route('student.index') }}" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Data
                Siswa</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Edit Data Siswa</span>
        </div>
    </x-slot:header>

    <div class="p-5 space-y-5 bg-white rounded">
        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                <input type="number" id="nis" name="nis" class="w-full border-gray-300 rounded"
                    placeholder="nis" value="{{ old('nis', $student->nis) }}">
                <x-input-error :messages="$errors->get('nis')" class="mt-2" />
            </div>

            <div class="mb-6">
                <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="user" name="name" class="w-full border-gray-300 rounded"
                    placeholder="nama" value="{{ old('name', $student->name) }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-6">
                <label for="rombel_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rombel</label>
                <select id="rombel_id" name="rombel_id" class="w-full border-gray-300 rounded select2">
                    <option selected disabled>Pilih Rombel</option>
                    @forelse ($rombels as $item)
                        <option @selected(old('rombel_id', $student->rombel_id) === $item->id) value="{{ $item->id }}">{{ $item->rombel }}</option>
                    @empty
                        <option value="">Data Tidak Ada</option>
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('rombel_id')" class="mt-2" />
            </div>

            <div class="mb-6">
                <label for="rayon_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rombel</label>
                {{-- <select id="rayon_id" name="rayon_id" class="w-full border-gray-300 rounded">
                    <option value="">Pilih</option>
                    @forelse ($rayons as $item)
                        <option @selected(old("rayon_id, $student->rayon_id") == $item->id) value="{{ $item->id }}">{{ $item->rayon }}</option>
                    @empty
                        <option value="">Data Tidak Ada</option>
                    @endforelse
                </select> --}}
                <select id="rayon_id" name="rayon_id" class="w-full border-gray-300 rounded select2">
                    <option selected disabled>Pilih Pembimbing Rayon</option>
                    @foreach ($rayons as $item)
                        <option @selected(old('user_id', $item->user_id) == $item->id) value="{{ $item->id }}">{{ $item->rayon }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('rayon_id')" class="mt-2" />
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>


</x-layout>
