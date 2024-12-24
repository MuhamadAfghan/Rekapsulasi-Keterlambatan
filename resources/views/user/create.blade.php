<x-layout>
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Edit Data User</h1>
        <div class="space-x-2">
            <a href="/" class="dark:text-blue-500 text-sm text-gray-400 hover:underline">Home</a>
            <span class="dark:text-gray-400 text-sm text-gray-400">/</span>
            <a href="{{ route('user.index') }}" class="dark:text-blue-500 text-sm text-gray-400 hover:underline">Data
                User</a>
            <span class="dark:text-gray-400 text-sm text-gray-400">/</span>
            <span class="dark:text-gray-400 text-sm text-gray-600">Edit Data User</span>
        </div>
    </x-slot:header>

    <div class="space-y-5 rounded bg-white p-5">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="user" class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Nama</label>
                <input type="text" id="user" name="name" class="w-full rounded border-gray-300"
                    placeholder="nama" value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-6">
                <label for="email" class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" name="email" class="w-full rounded border-gray-300"
                    placeholder="email" value="{{ old('email') }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- role: admin, ps --}}
            <div class="mb-6">
                <label for="role" class="dark:text-white mb-2 block text-sm font-medium text-gray-900">Role</label>
                <select id="role" name="role" class="select2 w-full rounded border-gray-300">
                    <option selected disabled>Pilih Role</option>
                    <option @selected(old('role') === 'ps') value="ps">Pembimbing Siswa</option>
                    <option @selected(old('role') === 'admin') value="admin">Admin</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            {{-- <div class="mb-6">
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" name="password" class="w-full border-gray-300 rounded"
                    placeholder="password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div> --}}

            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Simpan</button>
        </form>
    </div>


</x-layout>
