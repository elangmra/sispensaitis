<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran'; // Menentukan nama tabel yang digunakan

    protected $fillable = [
        'nama_pelajaran', 'kode_pelajaran', 'pengajar' // Kolom-kolom yang dapat diisi
    ];

    public $timestamps = true; // Mengaktifkan timestamps
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'mata_pelajaran_id');
    }
    public function teacher()
  {
    return $this->hasMany(Teacher::class);
  }
    public function tes()
    {
        return $this->hasMany(Tes::class);
    }
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }


}
