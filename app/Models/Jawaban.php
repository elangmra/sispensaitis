<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban_siswa';

    protected $fillable = [
        'tes_id',
        'peserta_didik_id',
        'jawaban',
        'skor',
        'mata_pelajaran_id',
        'total_score',
    ];
    public function tes(){
        return $this->belongsTo(Tes::class);
    }
    public function student(){
        return $this->belongsTo(PesertaDidik::class,'peserta_didik_id');
    }
    public function mata_pelajaran(){
        return $this->belongsTo(MataPelajaran::class,'mata_pelajaran_id');
    }
}
