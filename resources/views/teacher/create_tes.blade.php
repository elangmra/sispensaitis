<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Soal Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('store.tes') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
                            <input type="text" name="judul" id="judul" class="w-full px-3 py-2 border rounded-md" required placeholder="Latihan Soal/Ujian Tengah Semester">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
                            <input type="date" name="tanggal" id="tanggal" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="durasi" class="block text-gray-700 text-sm font-bold mb-2">Durasi (HH:MM):</label>
                            <input type="time" name="durasi" id="durasi" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <hr class="my-8 border-t border-gray-300">
                        <!-- Input untuk Soal -->
                        <div id="soal-container">
                            <div class="mb-4">
                                <label for="soal" class="block text-gray-700 text-sm font-bold mb-2">Soal:</label>
                                <input name="soal[]" id="soal" class="w-full px-3 py-2 border rounded-md" required></input>
                            </div>
                            <div class="mb-4">
                                <label for="kunci_jawaban" class="block text-gray-700 text-sm font-bold mb-2">Kunci Jawaban:</label>
                                <input name="kunci_jawaban[]" id="kunci_jawaban" class="w-full px-3 py-2 border rounded-md" required></input>
                            </div>
                        </div>
                        <!-- Input untuk Kunci Jawaban -->
                        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

                        <!-- Button Tambah Soal -->
                        <button type="button" id="tambah-soal" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700">Tambah Soal</button>

                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Simpan</button>
                            <a href="{{ route('tes',$kelas->id) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:bg-gray-300">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tambahSoalButton = document.getElementById('tambah-soal');
        const soalContainer = document.getElementById('soal-container');


        tambahSoalButton.addEventListener('click', function() {
            const divider = document.createElement('hr');
            divider.classList.add('my-8', 'border-t', 'border-gray-300');
            soalContainer.appendChild(divider);

            const newSoalInput = document.createElement('div');
            newSoalInput.classList.add('mb-4');
            newSoalInput.innerHTML = `
                <label for="soal" class="block text-gray-700 text-sm font-bold mb-2">Soal:</label>
                <input name="soal[]" class="w-full px-3 py-2 border rounded-md" required></input>
            `;
            const newKunciJawabanInput = document.createElement('div');
            newKunciJawabanInput.classList.add('mb-4');
            newKunciJawabanInput.innerHTML = `
                <label for="kunci_jawaban" class="block text-gray-700 text-sm font-bold mb-2">Kunci Jawaban:</label>
                <input name="kunci_jawaban[]" class="w-full px-3 py-2 border rounded-md" required></input>
            `;
            soalContainer.appendChild(newSoalInput);
            soalContainer.appendChild(newKunciJawabanInput);
        });
    });
</script>
