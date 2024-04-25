<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('teacher.kelas.index') }}" class="flex items-center mb-4 text-lg text-blue-500 hover:text-blue-700">
            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kelas: ') }}{{ $kelas->nama_kelas }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Murid Card -->
                        <div class="bg-gray-100 rounded-lg p-6 hover:bg-gray-200 transition duration-150 ease-in-out">
                            <div class="text-center">
                                <h3 class="mb-4 text-xl font-semibold">Murid</h3>
                                <p class="mb-4">Daftar semua murid di kelas ini.</p>
                                <a href="{{ route('teacher.kelas.murid', $kelas->id) }}" class="inline-block bg-blue-500 text-white rounded-full px-4 py-2">Lihat Murid</a>
                            </div>
                        </div>
                        <!-- Latihan Card -->
                        <div class="bg-gray-100 rounded-lg p-6 hover:bg-gray-200 transition duration-150 ease-in-out">
                            <div class="text-center">
                                <h3 class="mb-4 text-xl font-semibold">Soal</h3>
                                <p class="mb-4 ">Lihat semua soal yang diberikan pada kelas ini.</p>
                                <a href="{{ route('tes', $kelas->id) }}" class="inline-block bg-blue-500 text-white rounded-full px-4 py-2">Lihat Soal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
