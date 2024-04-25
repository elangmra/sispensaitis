<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'wali_kelas',
    ];
    public function student()
  {
    return $this->hasMany(PesertaDidik::class,'kelas_id');
  }
    public function tes()
  {
    return $this->hasMany(Tes::class,'kelas_id');
  }
  public function mata_pelajaran()
  {
      return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
  }
    public function teacher()
  {
    return $this->belongsTo(Teacher::class,'wali_kelas');
  }

}
