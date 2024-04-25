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
                        Edit Peserta Didik
                    </h2>

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li>
                                <a class="font-medium" href="{{ route('admin.dashboard') }}">Dashboard /</a>
                            </li>
                            <li>
                                <a class="font-medium" href="{{ route('admin.student.index') }}">Semua Peserta Didik /</a>
                            </li>
                            <li class="font-medium text-primary">Edit Peserta Didik</li>
                        </ol>
                    </nav>
                </div>
                <!-- Breadcrumb End -->

                <!-- Form Tambah Guru -->
                <form action="{{ route('student.update',$student->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input value={{ $student->nama }} type="text" name="nama" id="nama" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input value="{{ $student->user->email }}" type="text" name="email" id="email" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input value="{{ $student->tanggal_lahir }}" type="date" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 p-2 border rounded-md w-full">
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 p-2 border rounded-md w-full">
                            <option {{$student->jenis_kelamin == "Laki-laki" ? 'selected' : ''  }} value="Laki-laki">Laki-laki</option>
                            <option {{$student->jenis_kelamin == "Perempuan" ? 'selected' : ''  }} value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select name="kelas" id="kelas" class="mt-1 p-2 border rounded-md w-full">
                            @foreach(\App\Models\Kelas::all() as $class)
                                <option {{ $class->id == $student->kelas_id ? 'selected': '' }} value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                            @endforeach
                        </select>
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
