<x-layout>
    {{-- @dd($rayon->user_id) --}}
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Edit Data Rayon</h1>
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <a href="{{ route('rayon.index') }}" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Data
                Rayon</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Edit Data Rayon</span>
        </div>
    </x-slot:header>

    <div class="p-5 bg-white rounded">
        <form action="{{ route('rayon.update', $rayon->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="rayon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rayon</label>
                <input type="text" id="rayon" name="rayon" class="w-full border-gray-300 rounded"
                    placeholder="Rayon" value="{{ old('rayon', $rayon->rayon) }}">
                <x-input-error :messages="$errors->get('rayon')" class="mt-2" />

            </div>

            <div class="mb-6">
                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pembimbing
                    Rayon</label>
                <select name="user_id" class="w-full border-gray-300 rounded select2">
                    <option selected disabled>Pilih Pembimbing Rayon</option>
                    @foreach ($users as $item)
                        <option @selected(old('user_id', $rayon->user_id) == $item->id) value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />

            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>

</x-layout>
