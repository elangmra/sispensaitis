<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_telepon',
        'alamat',
        'user_id',
        'mata_pelajaran_id',
    ];
    public function user()
  {
    return $this->belongsTo(User::class);
  }
    public function kelas()
  {
    return $this->hasOne(Kelas::class,'wali_kelas');
  }
  public function mata_pelajaran()
  {
    return $this->belongsTo(MataPelajaran::class);
  }

  public function guru_kelas()
{
    return $this->hasMany(GuruKelas::class, 'guru_id', 'id');
}

}
