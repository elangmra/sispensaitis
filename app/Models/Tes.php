<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    use HasFactory;

    protected $table = 'tes';

    protected $fillable = [
        'judul',
        'data_soal',
        'kelas_id',
        'mata_pelajaran_id',
        'tanggal',
        'durasi'

    ];
    public function kelas()
  {
    return $this->belongsTo(Kelas::class);
  }
    public function mata_pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
    public function setDataSoalAttribute($value)
    {
        $this->attributes['data_soal'] = json_encode($value);
    }
    public function getDataSoalAttribute($value)
    {
        return json_decode($value, true);
    }
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

}
