<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\PesertaDidik;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MatapelajaranController extends Controller
{
    //
    public function index(Request $request)
    {
        $sort_search = null;
        $mapelQuery = MataPelajaran::query();

        if ($request->has('search')) {
            $sort_search = $request->search;

            $user_ids = MataPelajaran::where(function ($user) use ($sort_search) {
                $user->where('nama', 'like', '%' . $sort_search . '%');
            })->pluck('id')->toArray();


            $mapelQuery->whereIn('id', $user_ids);
        }

        $mapels = $mapelQuery->paginate(10);
        return view('backend.mata_pelajaran.index', compact('mapels'));
    }
    public function create()
    {

        return view('backend.mata_pelajaran.create');
    }

    public function store(Request $request){
        $request->validate([
            'pengajar' => 'required',
            'nama_mapel' => 'required',
            'kode_pelajaran' => 'required'
        ]);

        MataPelajaran::create([
            'pengajar' => $request->pengajar,
            'nama_pelajaran' => $request->nama_mapel,
            'kode_pelajaran' => $request->kode_pelajaran
        ]);

        return redirect()->route('admin.matapelajaran.index')->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }
    public function index_for_student(){
        $student = PesertaDidik::where('user_id', auth()->user()->id)->first();
        $kelas = Kelas::where('id', $student->kelas_id)->first();

        $mataPelajaranIds = explode(',', $kelas->mata_pelajaran_id);
        $mapels= [];

        foreach($mataPelajaranIds as $mataPelajaranId){
            $mapels[] = MataPelajaran::where('id', $mataPelajaranId)->first();
        }

        return view('student.mata_pelajaran',compact('mapels'));
    }
    public function mapel_show ($id){

        $mapel = MataPelajaran::find($id);
        if (!$mapel) {
            // Handle jika kelas tidak ditemukan
            abort(404);
        }

        return view('student.mata_pelajaran_show',compact('mapel'));
    }

    public function edit($id)
    {
        $mapel = MataPelajaran::find($id);
        return view('backend.mata_pelajaran.edit',compact('mapel'));
    }

    public function update(Request $request,$id)
    {
        $mapel = MataPelajaran::find($id);
        $request->validate([
            'pengajar' => 'required',
            'nama_mapel' => 'required',
            'kode_pelajaran' => 'required'
        ]);
        $mapel->update([
            'pengajar' => $request->pengajar,
            'nama_pelajaran' => $request->nama_mapel,
            'kode_pelajaran' => $request->kode_pelajaran
        ]);

        return redirect()->route('admin.matapelajaran.index')->with('success', 'Mata Pelajaran berhasil diupdate');
    }

    public function destroy($id){
        $mapel = MataPelajaran::find($id);
        $mapel->delete();

        return redirect()->route('admin.matapelajaran.index')->with('success', 'Mata Pelajaran berhasil dihapus');
    }
}
