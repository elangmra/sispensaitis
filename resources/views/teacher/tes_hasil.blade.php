<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('tes',$tes->kelas_id) }}" class="flex items-center mb-4 text-lg text-blue-500 hover:text-blue-700">
            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hasil
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
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Nilai
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Waktu Pengerjaan
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($jawabans as $jawaban)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        {{ $jawaban->student->nama }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        {{ $jawaban->total_score }}/100
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        {{ $jawaban->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                                        <a href="{{ route('tes.hasil.detail',$jawaban->id) }}" type="button" class="btn btn-outline-primary">Lihat</a>
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
