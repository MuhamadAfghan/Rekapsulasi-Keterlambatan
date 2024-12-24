<x-layout>
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Edit Data Rombel</h1>
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <a href="{{ route('rombel.index') }}" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Data
                Rombel</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Edit Data Rombel</span>
        </div>
    </x-slot:header>

    <div class="p-5 bg-white rounded">
        <form action="{{ route('rombel.update', $rombel->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="rombel"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rombel</label>
                <input type="text" id="rombel" name="rombel" class="w-full border-gray-300 rounded"
                    placeholder="Rombel" value="{{ old('rombel', $rombel->rombel) }}">
                <x-input-error :messages="$errors->get('rombel')" class="mt-2" />

            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Submit</button>
        </form>
    </div>

</x-layout>
