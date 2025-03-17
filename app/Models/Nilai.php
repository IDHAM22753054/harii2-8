<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    // Menambahkan atribut yang boleh diisi secara massal
    protected $fillable = ['student_id', 'teacher_id', 'mapel_id', 'nilai'];

    // Relasi dengan tabel student
    public function student()
    {
        return $this->belongsTo(Siswa::class, 'student_id');
    }

    // Relasi dengan tabel teacher
    public function teacher()
    {
        return $this->belongsTo(teacher::class);
    }

    // Relasi dengan tabel mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
