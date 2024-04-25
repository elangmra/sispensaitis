<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mulai Kerjakan Soal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">{{ $tes->judul }}</h3>
                        <p class="text-gray-600">Durasi: {{ $tes->durasi }}</p>
                    </div>
                    <form action="{{route('scoring')}}" method="POST">
                        @csrf
                        @foreach(json_decode($tes->data_soal) as $index => $soal)
                        <div class="mb-6">
                            <div class="mb-2">
                                <label for="soal-{{ $index }}" class="block text-gray-700 text-sm font-bold mb-2">Soal {{ $index + 1 }}:</label>
                                <p class="text-gray-600">{{ $soal }}</p>
                            </div>
                            <textarea  name="jawaban[{{ $soal}}]" id="soal-{{ $index }}" class="w-full px-3 py-2 border rounded-md" placeholder="Jawaban Anda"> </textarea>
                        </div>
                        @endforeach
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Submit Tes</button>
                            <a href="{{ route('student.tes',$tes->mata_pelajaran_id) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:bg-gray-300">Kembali</a>
                        </div>
                        <input type="hidden" name="tes_id" value="{{ $tes->id }}">
                        <input type="hidden" name="kelas_id" value="{{ $tes->kelas_id }}">
                        <input type="hidden" name="mata_pelajaran_id" value="{{ $tes->mata_pelajaran_id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
