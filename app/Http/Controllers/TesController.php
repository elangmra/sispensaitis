<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\PesertaDidik;
use App\Models\Teacher;
use App\Models\Tes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TesController extends Controller
{
    //
    public function index(Request $request)
    {

    }
    public function create($id)
    {
        $kelas = Kelas::find($id);
        return view('teacher.create_tes',compact('kelas'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'durasi' => 'required|date_format:H:i',
            'soal.*' => 'required|string', // Validasi untuk setiap input soal
            'kunci_jawaban.*' => 'required|string', // Validasi untuk setiap input soal
        ]);
        // Simpan data tes baru ke dalam database
        $tes = new Tes();
        $tes->judul = $request->judul;
        $tes->kelas_id = $request->kelas_id;
        $tes->mata_pelajaran_id = Auth::user()->teacher->mata_pelajaran_id;
        $tes->tanggal = $request->tanggal;
        $tes->durasi = $request->durasi;

        // Simpan data soal ke dalam kolom data_soal
        $tes->data_soal = json_encode($request->soal);

        // Simpan kunci jawaban ke dalam kolom kunci_jawaban
        $tes->kunci_jawaban = json_encode($request->kunci_jawaban);

        $tes->save();

        // Redirect ke halaman yang sesuai (misalnya halaman detail tes)
        return redirect()->route('tes',$request->kelas_id)->with('success', 'Tes berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tes = Tes::find($id);
        return view('teacher.edit_tes',compact('tes'));
    }
    public function update(Request $request, Tes $tes)
    {

        // Validasi data dari formulir
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'durasi' => 'required|date_format:H:i',
            'soal.*' => 'required|string', // Validasi untuk setiap input soal
            'kunci_jawaban.*' => 'required|string', // Validasi untuk setiap input kunci jawaban
        ]);

        // Memperbarui data tes yang ada
        $tes->judul = $request->judul;
        $tes->kelas_id = $request->kelas_id;
        $tes->mata_pelajaran_id = Auth::user()->teacher->mata_pelajaran_id;
        $tes->tanggal = $request->tanggal;
        $tes->durasi = $request->durasi;

        // Memperbarui data soal dan kunci jawaban
        $tes->data_soal = json_encode($request->soal);
        $tes->kunci_jawaban = json_encode($request->kunci_jawaban);

        $tes->save();

        // Redirect ke halaman yang sesuai (misalnya halaman detail tes)
        return redirect()->route('tes',$request->kelas_id)->with('success', 'Tes berhasil diperbarui');
    }
    public function destroy(Tes $tes)
    {
        // Hapus data tes
        $tes->delete();

        // Redirect ke halaman yang sesuai atau berikan respons JSON jika perlu
        return redirect()->route('tes.index')->with('success', 'Tes berhasil dihapus');
    }
    public function student_tes($mapel_id){
        $mapel = MataPelajaran::find($mapel_id);
        $student = PesertaDidik::where('user_id', auth()->user()->id)->first();
        $kelas = $student->kelas_id;
        $tes = Tes::where('kelas_id', $kelas)->where('mata_pelajaran_id',$mapel_id)->get();
        return view('student.tes',compact('tes','mapel'));
    }

    public function mulai_tes($tes_id){
        $tes = Tes::find($tes_id);
        return view('student.mulai_tes',compact('tes'));
    }

    public function hasil($id){
        $tes = Tes::where('id',$id)->first();
        $jawabans = Jawaban::where('tes_id',$id)->get();
        return view('teacher.tes_hasil',compact('tes','jawabans'));
    }
    public function hasil_detail($jawaban_id){
        $jawaban = Jawaban::where('id',$jawaban_id)->first();
        $tes = Tes::where('id',$jawaban->tes_id)->first();
        $jawabanSiswa = json_decode($jawaban->jawaban,true);
        $skorSiswa = json_decode($jawaban->skor,true);
        $kunciJawaban = json_decode($tes->kunci_jawaban,true);
        $data_soal = json_decode($tes->data_soal,true);
        return view('teacher.tes_details',compact('jawaban','tes','jawabanSiswa','skorSiswa','kunciJawaban','data_soal'));
    }
}
