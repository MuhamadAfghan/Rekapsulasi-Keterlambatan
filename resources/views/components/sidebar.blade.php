@props(['active' => false])

@php
    $currentRoute = Route::currentRouteName();

    if ($currentRoute == 'dashboard') {
        $active = 'dashboard';
    } elseif (
        $currentRoute == 'user.index' ||
        $currentRoute == 'rayon.index' ||
        $currentRoute == 'rombel.index' ||
        $currentRoute == 'student.index'
    ) {
        $active = 'master';
    } elseif (strpos($currentRoute, 'late') === 0) {
        $active = 'late';
    }
@endphp

<aside id="logo-sidebar"
    class="dark:bg-gray-800 dark:border-gray-700 fixed left-0 top-0 z-40 min-h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-20 transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="dark:bg-gray-800 h-full overflow-y-auto bg-white px-3 pb-4">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="dark:text-white {{ $active == 'dashboard' ? 'bg-indigo-50 dark:bg-gray-700 text-indigo-600' : 'hover:bg-indigo-50 dark:hover:bg-gray-700 text-blue-900' }} group flex items-center rounded p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="dark:text-gray-400 dark:group-hover:text-white h-5 w-5 transition duration-75 group-hover:text-indigo-600"
                        viewBox="0 0 16 16">
                        <path
                            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
                    </svg>
                    <span class="ms-3 group-hover:text-indigo-600">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li>
                    <button type="button"
                        class="{{ $active == 'master' ? 'bg-indigo-50 dark:bg-gray-700' : 'hover:bg-indigo-50 dark:hover:bg-gray-700' }} group flex w-full items-center rounded p-2 text-base text-blue-900 transition duration-75"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="dark:text-gray-400 dark:group-hover:text-white h-5 w-5 flex-shrink-0 text-blue-900 transition duration-75 group-hover:text-indigo-600"
                            viewBox="0
                            0 16 16">
                            <path
                                d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2z" />
                            <path
                                d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
                            <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                        </svg>
                        <span
                            class="ms-3 flex-1 whitespace-nowrap text-left text-blue-900 group-hover:text-indigo-600 rtl:text-right">Data
                            Master</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="{{ $active == 'master' ? 'block' : 'hidden' }} space-y-2 py-2">
                        <li>
                            <a href="{{ route('rombel.index') }}"
                                class="dark:text-white dark:hover:bg-gray-700 {{ $currentRoute == 'rombel.index' ? 'text-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'text-blue-900' }} group flex w-full items-center rounded p-2 pl-11 transition duration-75 hover:bg-indigo-50 hover:text-indigo-600">Data
                                Rombel</a>
                        </li>
                        <li>
                            <a href="{{ route('rayon.index') }}"
                                class="dark:text-white dark:hover:bg-gray-700 {{ $currentRoute == 'rayon.index' ? 'text-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'text-blue-900' }} group flex w-full items-center rounded p-2 pl-11 transition duration-75 hover:bg-indigo-50 hover:text-indigo-600">Data
                                Rayon</a>
                        </li>
                        <li>
                            <a href="{{ route('student.index') }}"
                                class="dark:text-white dark:hover:bg-gray-700 {{ $currentRoute == 'student.index' ? 'text-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'text-blue-900' }} group flex w-full items-center rounded p-2 pl-11 transition duration-75 hover:bg-indigo-50 hover:text-indigo-600">Data
                                Siswa</a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}"
                                class="dark:text-white dark:hover:bg-gray-700 {{ $currentRoute == 'user.index' ? 'text-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'text-blue-900' }} group flex w-full items-center rounded p-2 pl-11 transition duration-75 hover:bg-indigo-50 hover:text-indigo-600">Data
                                User</a>
                        </li>
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{ route('rombel.index') }}"
                        class="dark:text-white {{ $active == 'dashboard' ? 'bg-indigo-50 dark:bg-gray-700 text-indigo-600' : 'hover:bg-indigo-50 dark:hover:bg-gray-700 text-blue-900' }} group flex items-center rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="dark:text-gray-400 dark:group-hover:text-white h-5 w-5 flex-shrink-0 text-blue-900 transition duration-75 group-hover:text-indigo-600"
                            viewBox="0 0 16 16">
                            <path
                                d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z" />
                            <path
                                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                            <path
                                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                        </svg>
                        <span class="ms-3 group-hover:text-indigo-600">Data Siswa</span>
                    </a>
                </li>
            @endif
            <li>
                <button type="button"
                    class="{{ $active == 'late' ? 'bg-indigo-50 dark:bg-gray-700' : 'hover:bg-indigo-50 dark:hover:bg-gray-700' }} group flex w-full items-center rounded p-2 text-base text-blue-900 transition duration-75"
                    aria-controls="dropdown-late" data-collapse-toggle="dropdown-late">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="dark:text-gray-400 dark:group-hover:text-white h-5 w-5 flex-shrink-0 text-blue-900 transition duration-75 group-hover:text-indigo-600"
                        viewBox="0 0 16 16">
                        <path
                            d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z" />
                        <path
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                        <path
                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                    </svg>
                    <span
                        class="ms-3 flex-1 whitespace-nowrap text-left text-blue-900 group-hover:text-indigo-600 rtl:text-right">Data
                        Keterlambatan</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-late" class="{{ $active == 'late' ? 'block' : 'hidden' }} space-y-2 py-2">
                    <li>
                        <a href="{{ route('late.index') }}"
                            class="{{ $currentRoute == 'late.index' ? 'text-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'text-blue-900' }} dark:text-white dark:hover:bg-gray-700 group flex w-full items-center rounded p-2 pl-11 transition duration-75 hover:bg-indigo-50 hover:text-indigo-600">Keseluruhan
                            Data</a>
                    </li>
                    <li>
                        <a href="{{ route('late.rekap') }}"
                            class="{{ $currentRoute == 'late.rekap' ? 'text-indigo-600 bg-indigo-50 dark:bg-gray-700' : 'text-blue-900' }} dark:text-white dark:hover:bg-gray-700 group flex w-full items-center rounded p-2 pl-11 transition duration-75 hover:bg-indigo-50 hover:text-indigo-600">Rekaptulasi
                            Data</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
