<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PesertaDidik;
use App\Models\Teacher;
use App\Models\Tes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelasController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_search = null;

        $kelasQuery = Kelas::query();

        if ($request->has('search')) {
            $sort_search = $request->search;

            $user_ids = Kelas::where(function ($user) use ($sort_search) {
                $user->where('nama', 'like', '%' . $sort_search . '%');
            })->pluck('id')->toArray();


            $kelasQuery->whereIn('id', $user_ids);
        }
        $allClass = $kelasQuery->paginate(10);
        return view('backend.kelas.index', compact('allClass'));
    }
    public function create()
    {

        return view('backend.kelas.create');
    }

    public function store(Request $request){
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama;
        $kelas->wali_kelas = $request->wali_kelas;
         // Mengonversi array mata_pelajaran menjadi string yang dipisahkan dengan koma
        $mataPelajaranIds = implode(',', $request->mata_pelajaran);
        $kelas->mata_pelajaran_id = $mataPelajaranIds;
        $kelas->save();

        // Redirect ke halaman index guru atau ke halaman lain yang diinginkan
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function kelas_teacher_index (){

        $guru = Teacher::where('user_id', auth()->user()->id)->first();
        // Dapatkan mata_pelajaran_id dari guru tersebut
        $mapelId = $guru->mata_pelajaran_id;
        // Gunakan query untuk mencari kelas yang memiliki mata_pelajaran_id ini
        $kelas = Kelas::whereRaw("FIND_IN_SET(?, mata_pelajaran_id)", [$mapelId])->get();

        return view('teacher.kelas',compact('kelas'));
    }
    public function kelas_show ($id){

        $kelas = Kelas::with(['student'])->find($id);
        if (!$kelas) {
            // Handle jika kelas tidak ditemukan
            abort(404);
        }

        return view('teacher.show_kelas',compact('kelas'));
    }
    public function murid_show ($id){

        $kelas = Kelas::with(['student'])->find($id);
        if (!$kelas) {
            // Handle jika kelas tidak ditemukan
            abort(404);
        }

        return view('teacher.murid_show',compact('kelas'));
    }
    public function tes ($id){

        $kelas = Kelas::with(['student'])->find($id);
        if (!$kelas) {
            // Handle jika kelas tidak ditemukan
            abort(404);
        }
        $tes = Tes::where('kelas_id', $id)->where('mata_pelajaran_id',Auth::user()->teacher->mata_pelajaran_id)->get();

        return view('teacher.tes',compact('kelas','tes'));
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('backend.kelas.edit',compact('kelas'));
    }
    public function destroy($id){
        $kelas = Kelas::find($id);
        $kelas->delete();

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus');
    }
    public function update(Request $request,$id)
    {
        $kelas = Kelas::where('id',$id)->first();

        // Validasi data dari formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'wali_kelas' => 'required|string',
            'mata_pelajaran.*' => 'required|string', // Validasi untuk setiap input mata pelajaran
        ]);

        // Memperbarui data kelas yang ada
        $kelas->nama_kelas = $request->nama;
        $kelas->wali_kelas = $request->wali_kelas;
        // Mengonversi array mata_pelajaran menjadi string yang dipisahkan dengan koma
        $mataPelajaranIds = implode(',', $request->mata_pelajaran);
        $kelas->mata_pelajaran_id = $mataPelajaranIds;

        $kelas->save();

        // Redirect ke halaman yang sesuai (misalnya halaman detail kelas)
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui');
    }
}
