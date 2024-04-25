<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruKelas extends Model
{
    use HasFactory;

    protected $table = 'guru_kelas';

    protected $fillable = [
        'guru_id',
        'kelas_id',
        'mata_pelajaran_id'
    ];
    public $timestamps = false;

    // Definisikan relasi ke model Guru
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'guru_id');
    }

    // Definisikan relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Definisikan relasi ke model MataPelajaran
    public function mata_pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }
}
