<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kelas;
use App\Models\PesertaDidik;
use App\Models\Teacher;
use App\Models\Tes;
use App\Models\User;
use App\Models\MataPelajaran;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JawabanController extends Controller
{
    //
    public function index(Request $request)
    {

    }
    public function create()
    {


    }

    public function store(Request $request){

    }


    public function scoring (Request $request){

        $client = new Client();

        // Mengambil tes berdasarkan ID
        $tes = Tes::find($request->tes_id);

        // Menguraikan data soal dan kunci jawaban dari JSON ke objek/array PHP
        $soal = json_decode($tes->data_soal,true);
        $kunciJawaban = json_decode($tes->kunci_jawaban,true);

        $jawabanSiswa = $request->jawaban;
        $scores = []; // Untuk menyimpan skor setiap jawaban

        // Asumsi bahwa setiap soal dalam $soal memiliki pasangan kunci jawaban yang sesuai di $kunciJawaban
        // Mengubah struktur $kunciJawaban agar menggunakan pertanyaan sebagai kunci
        $kunciJawabanDenganPertanyaan = [];
        foreach ($soal as $index => $pertanyaan) {
            $kunciJawabanDenganPertanyaan[$pertanyaan] = $kunciJawaban[$index];
        }


        foreach ($jawabanSiswa as $pertanyaan => $jawaban) {
            if (isset($kunciJawabanDenganPertanyaan[$pertanyaan])) {
                $keyAnswer = $kunciJawabanDenganPertanyaan[$pertanyaan];

                $response = $client->post('http://sispensaitis.my.id/flask-app/', [
                    'json' => [
                        'student_answer' => $jawaban,
                        'key_answer' => $keyAnswer
                    ]
                ]);
                $score = json_decode((string) $response->getBody(), true);
                $scores[$pertanyaan] = $score['score'];  // Simpan skor ke array dengan index untuk tracking
            }

        }
        // Menghitung total skor pada skala 0 hingga 1
        $totalScoreRaw = array_sum($scores);

        // Menghitung total skor pada skala 100
        // Asumsikan setiap soal memiliki bobot yang sama
        $totalScore = ($totalScoreRaw / count($soal)) * 100;

        $jawaban = new Jawaban;
        $jawaban->tes_id = $tes->id;
        $jawaban->peserta_didik_id = Auth::user()->student->id;
        $jawaban->jawaban = json_encode($jawabanSiswa);
        $jawaban->skor = json_encode($scores);
        $jawaban->mata_pelajaran_id = $tes->mata_pelajaran_id;
        $jawaban->total_score = $totalScore;
        $jawaban->save();

        return redirect()->route('student.tes',$tes->mata_pelajaran_id)->with('success', 'Scoring berhasil ditambahkan');
    }

    public function detail_tes($id_tes){
        $tes = Tes::find($id_tes);
        $jawaban = Jawaban::where('tes_id',$id_tes)->where('peserta_didik_id',Auth::user()->student->id)->first();


        $mapel = MataPelajaran::where('id',$tes->mata_pelajaran_id)->first();

        return view('student.detail_tes',compact('tes','jawaban','mapel'));
    }

}
