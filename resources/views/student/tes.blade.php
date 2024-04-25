<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('matapelajaran.show',$mapel->id) }}" class="flex items-center mb-4 text-lg text-blue-500 hover:text-blue-700">
            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List Soal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Judul Soal
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Durasi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Nilai
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>

                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tes as $test)
                                @php
                                     $labelClasses = [
                                        'Sudah Dikerjakan' => 'bg-green-100 text-green-800',
                                        'Belum Dikerjakan' => 'bg-yellow-100 text-yellow-800',
                                        'Tidak Dikerjakan' => 'bg-red-100 text-red-800',
                                    ];
                                    $jawaban = $test->jawaban->where('peserta_didik_id', Auth::user()->student->id)->first();
                                @endphp
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        {{ $test->judul }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        {{ $test->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        {{ $test->durasi }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        {{ $jawaban->total_score ?? 'Belum Dinilai'}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        @if(isset($jawaban) && $jawaban->jawaban != null)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $labelClasses['Sudah Dikerjakan'] }}">
                                                Sudah Dikerjakan
                                            </span>
                                        @elseif(\Carbon\Carbon::now()->lt($test->tanggal)  && !isset($jawaban))
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $labelClasses['Belum Dikerjakan'] }}">
                                                Belum Dikerjakan
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $labelClasses['Tidak Dikerjakan'] }}">
                                                Tidak Dikerjakan
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">

                                        @if(\Carbon\Carbon::now()->lt($test->tanggal)  && !isset($jawaban)) <!-- Jika waktu sekarang masih kurang dari tanggal tes -->
                                            <a href="{{ route('kerjakan.tes', $test->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Kerjakan</a>
                                        @elseif(isset($jawaban) && $jawaban->jawaban != null)
                                            <a href="{{ route('student.detail.tes', $test->id) }}" class="inline-block px-4 py-2 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Lihat Detail</a>
                                        @else
                                            <button class="inline-block px-4 py-2 bg-gray-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md cursor-not-allowed" disabled>Kadaluarsa</button>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
