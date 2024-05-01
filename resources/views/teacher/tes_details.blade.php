<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('tes.hasil', $tes->id) }}" class="flex items-center mb-4 text-lg text-blue-500 hover:text-blue-700">
            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hasil Detail
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-responsive p-6 bg-white border-b border-gray-200">
                    <table class="table min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Pertanyaan
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Jawaban
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Kunci Jawaban
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Skor
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $jawabanSiswa = json_decode($jawaban->jawaban,true);
                                $skorSiswa = json_decode($jawaban->skor,true);
                                $kunciJawaban = json_decode($tes->kunci_jawaban,true);
                                $data_soal = json_decode($tes->data_soal,true);


                            @endphp
                            @foreach($data_soal as $index => $soal)
                                <tr>
                                    <td class="px-6 py-4 word-break text-sm text-gray-500">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 word-break text-sm text-gray-500">
                                        {{ $soal }}
                                    </td>
                                    <td class="px-6 py-4 word-break text-sm text-gray-500">
                                        {{ $jawabanSiswa[$soal] }}
                                    </td>
                                    <td class="px-6 py-4 word-break text-sm text-gray-500">
                                        {{ $kunciJawaban[$index]}}
                                    </td>
                                    <td class="px-6 py-4 word-break text-sm">
                                        {{ $skorSiswa[$soal]*100/count($data_soal)}}
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
