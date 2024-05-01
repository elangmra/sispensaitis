<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_search = null;
        $teachersQuery = Teacher::query();

        if ($request->has('search')) {
            $sort_search = $request->search;

            $user_ids = Teacher::where(function ($user) use ($sort_search) {
                $user->where('nama', 'like', '%' . $sort_search . '%');
            })->pluck('id')->toArray();


            $teachersQuery->whereIn('id', $user_ids);
        }

        $teachers = $teachersQuery->paginate(10);
        return view('backend.teacher.index', compact('teachers'));
    }
    public function create()
    {



        return view('backend.teacher.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role_id =2;
        $user->password = Hash::make('123456');
        $user->save();

        $teacher = Teacher::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'mata_pelajaran_id' => $request->mata_pelajaran,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'user_id' => $user->id,
        ]);

        // Sekarang Anda bisa menggunakan $teacher->id untuk mendapatkan ID baru
        $mapel = MataPelajaran::where('id', $request->mata_pelajaran)->first();
        $mapel->pengajar = $teacher->id;
        $mapel->save();

        // Redirect ke halaman index guru atau ke halaman lain yang diinginkan
        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function teacher_index(Request $request){
        return view('teacher.dashboard');
    }
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('backend.teacher.edit',compact('teacher'));
    }
    public function update(Request $request,$id)
    {
        $teacher = Teacher::find($id);
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);


            $teacher->nama =  $request->nama;
            $teacher->jenis_kelamin =  $request->jenis_kelamin;
            $teacher->no_telepon =  $request->no_telepon;
            $teacher->alamat =  $request->alamat;
            $teacher->mata_pelajaran_id =  $request->mata_pelajaran;


        // Sekarang Anda bisa menggunakan $teacher->id untuk mendapatkan ID baru
        $mapel = MataPelajaran::where('id', $request->mata_pelajaran)->first();
        $mapel->pengajar = $teacher->id;
        $mapel->save();


        $user = User::where('id',$teacher->user_id)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil diupdate');
    }
    public function destroy($id){
        $teacher = Teacher::find($id);
        $teacher->delete();

        $user = User::find($teacher->user_id);
        $user->delete();

        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil dihapus');
    }

}
