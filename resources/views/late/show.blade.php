<x-layout>
    <link rel="stylesheet" href="https://veno.es/venobox/js/venobox/dist/venobox.min.css?v=2.1.3" type="text/css"
        media="screen" />
    <script type="text/javascript" src="https://veno.es/venobox/js/venobox/dist/venobox.min.js?v=2.1.3"></script>


    <x-slot:header>
        <h1 class="text-xl font-semibold text-blue-900">Detail Data Keterlambatan</h1>
        <div class="space-x-2">
            <a href="/" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Home</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <a href="{{ route('late.index') }}" class="text-sm text-gray-400 hover:underline dark:text-blue-500">Data
                Keterlambatan</a>
            <span class="text-sm text-gray-400 dark:text-gray-400">/</span>
            <span class="text-sm text-gray-600 dark:text-gray-400">Detail Data Keterlambatan</span>
        </div>
    </x-slot:header>

    <div class="flex items-end gap-2 mt-5">
        <h2 class="text-3xl font-semibold text-indigo-900 dark:text-white">
            {{ $student->name }}
        </h2>
        <span class="text-xl text-gray-400 dark:text-gray-400 ">|</span>
        <span class="text-xl text-gray-400 dark:text-gray-400 ">{{ $student->nis }}</span>
        <span class="text-xl text-gray-400 dark:text-gray-400 ">|</span>
        <span class="text-xl text-gray-400 dark:text-gray-400 ">{{ $student->rombel->rombel }}</span>
        <span class="text-xl text-gray-400 dark:text-gray-400 ">|</span>
        <span class="text-xl text-gray-400 dark:text-gray-400 ">{{ $student->rayon->rayon }}</span>
    </div>

    <div class="mt-5">
        <div class="grid grid-cols-2 gap-5 md:grid-cols-3 xl:grid-cols-4">
            @foreach ($student->lates as $item)
                <div class="p-5 bg-white rounded">
                    <h5 class="mb-5 text-xl font-semibold tracking-tight text-indigo-900 dark:text-white">
                        Keterlambatan Ke-{{ $loop->iteration }}
                    </h5>
                    <div class="space-y-5">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $item->date_time_late }}
                        </span>

                        <div class="whitespace-nowrap ">
                            <a href="{{ '/storage/' . $item->bukti }}" class="project-gallery-link venobox-item"
                                data-vbtype="image" data-gall="gallery-{{ $item->id }}"
                                data-title="Keterlambatan Ke-{{ $loop->iteration }}">
                                <img src="{{ '/storage/' . $item->bukti }}" alt=""
                                    class="sm:w-full rounded-lg aspect-[4/3] object-cover">
                            </a>
                        </div>

                        <p class="text-sm text-blue-700 dark:text-gray-300">
                            <span class="block font-medium">Keterangan:</span>
                            {{ $item->information }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        new VenoBox({
            selector: ".venobox-item",
            titleattr: 'data-title',
            numeration: true,
            share: true,
        });
    </script>
</x-layout>
