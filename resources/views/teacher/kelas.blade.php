<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="mb-3">
                        Selamat Datang, {{ Auth::user()->name }}
                    </p>
                    <div class="flex flex-wrap -m-4">
                        @foreach($kelas as $kelasItem)
                            <div class="p-4 md:w-1/3">
                                <div class="h-full border-2 border-gray-200 rounded-lg overflow-hidden">
                                    <div class="p-6">
                                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">
                                            KELAS
                                        </h2>
                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                            {{ $kelasItem->nama_kelas }}
                                        </h1>
                                        <a href="{{ route('teacher.kelas.show',$kelasItem->id) }}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                                            Lihat Lebih Lanjut
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
