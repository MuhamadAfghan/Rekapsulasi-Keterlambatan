<x-layout>
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Edit Data User</h1>
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <a href="{{ route('user.index') }}" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Data
                User</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Edit Data User</span>
        </div>
    </x-slot:header>

    <div class="p-5 space-y-5 bg-white rounded">
        <h1 class="text-xl font-semibold text-blue-900">Edit informasi akun <span
                class="font-bold">{{ $user->name }}</span></h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="user" name="name" class="w-full border-gray-300 rounded"
                    placeholder="nama" value="{{ old('name', $user->name) }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" class="w-full border-gray-300 rounded"
                    placeholder="email" value="{{ old('email', $user->email) }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- role: admin, ps --}}
            <div class="mb-6">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" name="role" class="w-full border-gray-300 rounded">
                    <option @selected(old('role', $user->role) === 'ps') value="ps">Pembimbing Siswa</option>
                    <option @selected(old('role', $user->role) === 'admin') value="admin">Admin</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>

    <div class="p-5 mt-5 space-y-5 bg-white rounded">
        <h1 class="text-xl font-semibold text-blue-900">Ganti Password akun <span
                class="font-bold">{{ $user->name }}</span></h1>
        <form action="{{ route('user.update.password', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan
                    password baru</label>
                <input type="password" id="password" name="password" class="w-full border-gray-300 rounded"
                    placeholder="password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
        </form>
    </div>

</x-layout>
