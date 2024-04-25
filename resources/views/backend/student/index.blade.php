@extends('backend.layout.main')
@section('content')
     <!-- ===== Content Area Start ===== -->
     <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        @include('backend.layout.partials.header')
        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                <div class="mx-auto max-w-270">
                    <!-- Breadcrumb Start -->
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <h2 class="text-title-md2 font-bold text-black dark:text-white">
                            Semua Peserta Didik
                        </h2>

                        <nav>
                            <ol class="flex items-center gap-2">
                                <li>
                                    <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                                </li>
                                <li class="font-medium text-primary">Peserta Didik</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Breadcrumb End -->

                    <!-- ====== Settings Section Start -->
                    <div class="grid grid-cols-5 gap-8">
                        <div class="col-span-5">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold">Daftar Peserta Didik</h2>
                                </div>
                                <div class="flex items-center align-middle">
                                    <form id="sort_sellers" action="" method="GET" class="m-0">
                                        <input type="text" id="search" name="search" class="form-control p-3" placeholder="Tulis nama atau email lalu enter" @isset($sort_search) value="{{ $sort_search }}" @endisset>
                                    </form>

                                    <a href="{{ route('student.create') }}" class="ml-4 inline-block bg-primary text-white px-4 py-2 rounded-md">Tambah Peserta Didik</a>
                                </div>
                            </div>
                            <div
                                class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark overflow-x-auto">
                                <table class="w-full min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No.
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Jenis Kelamin
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Lahir
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Kelas
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi
                                            </th>
                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($students as $key => $student)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $key + 1}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->nama }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->jenis_kelamin }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->tanggal_lahir }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $student->kelas->nama_kelas }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <a href="{{ route('student.edit', $student->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="inline" style="margin-bottom: 0px !important;">
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
                                                <!-- Add more columns' data as needed -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div >
                                    {{ $students->appends(request()->input())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
     </div>
@endsection

<script>
    function sort_sellers(el){
        $('#sort_sellers').submit();
    }

</script>
