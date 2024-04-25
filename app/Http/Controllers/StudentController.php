<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_search = null;

        $studentQuery = PesertaDidik::query();

        if ($request->has('search')) {
            $sort_search = $request->search;

            $user_ids = PesertaDidik::where(function ($user) use ($sort_search) {
                $user->where('nama', 'like', '%' . $sort_search . '%');
            })->pluck('id')->toArray();


            $studentQuery->whereIn('id', $user_ids);
        }
        $students = $studentQuery->paginate(10);
        return view('backend.student.index', compact('students'));
    }
    public function create()
    {

        return view('backend.student.create');
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role_id =3;
        $user->password = Hash::make('123456');
        $user->save();

        $student = new PesertaDidik;
        $student->nama = $request->nama;
        $student->user_id = $user->id;
        $student->tanggal_lahir = $request->tanggal_lahir;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->kelas_id = $request->kelas;
        $student->save();



        // Redirect ke halaman index guru atau ke halaman lain yang diinginkan
        return redirect()->route('admin.student.index')->with('success', 'Murid berhasil ditambahkan');
    }
    public function student_dashboard(){
        return view('student.dashboard');
    }
    public function edit($id)
    {
        $student = PesertaDidik::find($id);
        return view('backend.student.edit',compact('student'));
    }
    public function update(Request $request,$id)
    {
        $student = PesertaDidik::find($id);
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
        ]);

        $student->nama = $request->nama;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->tanggal_lahir = $request->tanggal_lahir;
        $student->kelas_id = $request->kelas;
        $student->save();

        $user = User::where('id',$student->user_id)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.student.index')->with('success', 'Murid berhasil diupdate');
    }

    public function destroy($id)
    {
        $student = PesertaDidik::find($id);
        $student->delete();

        $user = User::where('id',$student->user_id)->first();
        $user->delete();

        return redirect()->route('admin.student.index')->with('success', 'Murid berhasil dihapus');
    }

}
