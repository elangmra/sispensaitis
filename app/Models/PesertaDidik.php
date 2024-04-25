<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    use HasFactory;

    protected $table = 'peserta_didik';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'user_id',
        'kelas_id',
        'tanggal_lahir',
    ];
    public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function kelas()
  {
      return $this->belongsTo(Kelas::class);
  }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
