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
                        Edit Kelas
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium" href="{{ route('admin.kelas.index') }}">Semua Kelas /</a>
                            </li>
                            <li class="font-medium text-primary">Edit Kelas</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- Form Tambah Guru -->
                <form action="{{ route('kelas.update',$kelas->id) }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                        <input value="{{ $kelas->nama_kelas }}" type="text" name="nama" id="nama" class="mt-1 p-2 border rounded-md w-full">
                    </div>

                    <div class="mb-4">
                        <label for="wali_kelas" class="block text-sm font-medium text-gray-700">Wali Kelas</label>
                        <select name="wali_kelas" id="wali_kelas" class="mt-1 p-2 border rounded-md w-full">
                            @foreach(\App\Models\Teacher::all() as $guru)
                                <option {{ $kelas->wali_kelas == $guru->id ? 'selected' : '' }} value="{{ $guru->id }}">{{ $guru->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                        @foreach(\App\Models\MataPelajaran::all() as $pelajaran)
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="mata_pelajaran[]"
                                    value="{{ $pelajaran->id }}"
                                    id="pelajaran{{ $pelajaran->id }}"
                                    class="mr-2"
                                    {{ in_array($pelajaran->id, explode(',', $kelas->mata_pelajaran_id)) ? 'checked' : '' }}>
                                <label for="pelajaran{{ $pelajaran->id }}">{{ $pelajaran->nama_pelajaran }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- ... (Tambahkan input dan field form yang diperlukan) ... -->
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md">Simpan</button>
                </form>
            </div>
        </div>
    </main>
    <!-- ===== Main Content End ===== -->
</div>

@endsection
