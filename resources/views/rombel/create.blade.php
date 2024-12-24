<x-layout>
    <x-slot:header>
        <h1 class="text-xl text-blue-900 font-semibold">Tambah Data Rombel</h1>
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <a href="{{ route('rombel.index') }}" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Data
                Rombel</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Tambah Data Rombel</span>
        </div>
    </x-slot:header>

    <div class="bg-white rounded p-5">
        <form action="{{ route('rombel.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="rombel"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rombel</label>
                <input type="text" id="rombel" name="rombel" class="rounded w-full border-gray-300"
                    placeholder="Rombel" value="{{ old('rombel') }}">
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Tambah</button>
        </form>
    </div>

</x-layout>
