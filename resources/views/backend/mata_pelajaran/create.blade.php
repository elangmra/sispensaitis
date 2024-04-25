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
                        Tambah Mata Pelajaran
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium" href="{{ route('admin.matapelajaran.index') }}">Semua Mata Pelajaran /</a>
                            </li>
                            <li class="font-medium text-primary">Tambah Mata Pelajaran</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- Form Tambah Guru -->
                <form action="{{ route('matapelajaran.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" id="nama" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="kode_pelajaran" class="block text-sm font-medium text-gray-700">Kode Pelajaran</label>
                        <input type="text" name="kode_pelajaran" id="kode_pelajaran" class="mt-1 p-2 border rounded-md w-full">
                    </div>

                    <div class="mb-4">
                        <label for="pengajar" class="block text-sm font-medium text-gray-700">Pengajar</label>
                        <select name="pengajar" id="pengajar" class="mt-1 p-2 border rounded-md w-full">
                            @foreach(\App\Models\Teacher::all() as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- ... (Tambahkan input dan field form yang diperlukan) ... -->
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md">Simpan Guru</button>
                </form>
            </div>
        </div>
    </main>
    <!-- ===== Main Content End ===== -->
</div>

@endsection
