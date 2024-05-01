<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('teacher.kelas.show',$kelas->id) }}" class="flex items-center mb-4 text-lg text-blue-500 hover:text-blue-700">
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
        <div class="table-responsive max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4 flex justify-end">
                        <a href="{{route('create.tes',$kelas->id)}}" class="flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Soal
                        </a>
                    </div>
                    <table class="table w-full min-w-full divide-y divide-gray-200">
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
                                    Aksi
                                </th>
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tes as $test)
                                <tr>
                                    <td class="px-6 py-4 word-break text-base text-gray-500">
                                        {{ $test->judul }}
                                    </td>
                                    <td class="px-6 py-4 word-break text-base text-gray-500">
                                        {{ $test->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 word-break text-base text-gray-500">
                                        {{ $test->durasi }}
                                    </td>
                                    <td class="px-6 py-4 word-break text-base text-gray-500">
                                        <div class="flex items-center">
                                            <a href="{{ route('tes.hasil',$test->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <!-- Put the path elements here to draw the eye -->
                                                    <path d="M10 3a7 7 0 00-7 7c0 3.866 3.134 7 7 7s7-3.134 7-7a7 7 0 00-7-7zm0 12a5 5 0 01-5-5c0-1.103.897-2 2-2a1 1 0 100-2c-2.206 0-4 1.794-4 4a3.98 3.98 0 004 4c1.104 0 2-.897 2-2a1 1 0 10-2 0 3 3 0 01-3 3c-1.654 0-3-1.346-3-3s1.346-3 3-3a1 1 0 100-2c-2.206 0-4 1.794-4 4a5 5 0 005 5c.712 0 1.382-.15 2-.416v1.166a1 1 0 002 0v-1.166c.618.266 1.288.416 2 .416a5 5 0 005-5z"/>
                                                </svg>
                                            </a>
                                            <a href="{{ route('edit.tes',$test->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('tes.destroy', $test->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zm0 2h2v12H9V4z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

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
