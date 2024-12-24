<x-layout>
    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Dashboard</h1>
        {{-- <p class="text-gray-500">Selamat datang di dashboard</p> --}}
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Dashboard</span>
        </div>
    </x-slot:header>

    <div class="grid grid-cols-2 gap-4 mb-4 lg:grid-cols-4">
        <div class="flex flex-col col-span-2 gap-3 p-4 rounded shadow bg-gray-50 dark:bg-gray-800">
            @if (auth()->user()->role == 'admin')
                <h1 class="text-xl font-semibold text-blue-900">Peserta didik</h1>
            @elseif(auth()->user()->role == 'ps')
                <h1 class="text-xl font-semibold text-blue-900">Peserta didik Rayon
                    {{ $rayon->rayon }}</h1>
                </h1>
            @endif
            <div class="flex items-center gap-3 text-2xl dark:text-gray-500">
                <section class="p-5 rounded-full bg-indigo-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="text-indigo-600 h-7 w-7" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                </section>
                <span class="font-bold text-blue-900">{{ $students->count() }}</span>
            </div>
        </div>

        @if (auth()->user()->role == 'admin')
            <div class="flex flex-col gap-3 p-4 rounded shadow bg-gray-50 dark:bg-gray-800">
                <h1 class="text-xl font-semibold text-blue-900">Administrator</h1>
                <div class="flex items-center gap-3 text-2xl dark:text-gray-500">
                    <section class="p-5 rounded-full bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-indigo-600 h-7 w-7" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </section>
                    <span class="font-bold text-blue-900">{{ $admins->count() }}</span>
                </div>
            </div>
            <div class="flex flex-col gap-3 p-4 rounded shadow bg-gray-50 dark:bg-gray-800">
                <h1 class="text-xl font-semibold text-blue-900">Pembibimbing siswa</h1>
                <div class="flex items-center gap-3 text-2xl dark:text-gray-500">
                    <section class="p-5 rounded-full bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-indigo-600 h-7 w-7" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </section>
                    <span class="font-bold text-blue-900">{{ $users->count() }}</span>
                </div>
            </div>
        @elseif (auth()->user()->role == 'ps')
            <div class="flex flex-col col-span-2 gap-3 p-4 rounded shadow bg-gray-50 dark:bg-gray-800">
                <h1 class="text-xl font-semibold text-blue-900">Keterlambatan {{ $rayon->rayon }} Hari ini</h1>
                <div class="flex items-center gap-3 text-2xl dark:text-gray-500">
                    <section class="p-5 rounded-full bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-indigo-600 h-7 w-7" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </section>
                    <span class="font-bold text-blue-900">{{ $lates->count() }}</span>
                </div>
            </div>
        @endif
    </div>
    @if (auth()->user()->role == 'admin')
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex flex-col gap-3 p-4 rounded shadow bg-gray-50 dark:bg-gray-800 ">
                <h1 class="text-xl font-semibold text-blue-900">Rombel</h1>
                <div class="flex items-center gap-3 text-2xl dark:text-gray-500">
                    <section class="p-5 rounded-full bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-indigo-600 h-7 w-7" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z" />
                            <path
                                d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z" />
                        </svg>
                    </section>
                    <span class="font-bold text-blue-900">{{ $rombels->count() }}</span>
                </div>
            </div>
            <div class="flex flex-col gap-3 p-4 rounded shadow bg-gray-50 dark:bg-gray-800">
                <h1 class="text-xl font-semibold text-blue-900">Rayon</h1>
                <div class="flex items-center gap-3 text-2xl dark:text-gray-500">
                    <section class="p-5 rounded-full bg-indigo-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="text-indigo-600 h-7 w-7" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z" />
                            <path
                                d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z" />
                        </svg>
                    </section>
                    <span class="font-bold text-blue-900">{{ $rayons->count() }}</span>
                </div>
            </div>
        </div>
    @endif

</x-layout>
