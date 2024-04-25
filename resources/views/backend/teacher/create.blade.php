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
                        Tambah Guru
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium" href="{{ route('admin.teacher.index') }}">Semua Guru /</a>
                            </li>
                            <li class="font-medium text-primary">Tambah Guru</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- Form Tambah Guru -->
                <form action="{{ route('teachers.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email" class="mt-1 p-2 border rounded-md w-full">
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 p-2 border rounded-md w-full">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="no_telepon" class="block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="mt-1 p-2 border rounded-md w-full">
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="mt-1 p-2 border rounded-md w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="mata_pelajaran" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                        <select name="mata_pelajaran" id="mata_pelajaran" class="mt-1 p-2 border rounded-md w-full">
                            @foreach(\App\Models\MataPelajaran::all() as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->nama_pelajaran }}</option>
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
