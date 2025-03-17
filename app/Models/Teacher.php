<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'teacher'; // Pastikan nama tabel sesuai dengan yang ada di database

    /**
     * Atribut yang dapat diisi (Mass Assignment)
     *
     * @var array
     */
    protected $fillable = [
        'name',     // Sesuaikan dengan kolom di tabel
        'email',    // Sesuaikan dengan kolom di tabel
        'phone', 
        'address',
        'photo', 
        'jabatan',  // Perbaiki di sini, tambahkan koma
        'gender',   // Perbaiki di sini, tambahkan koma
        'status',  
    ];

    /**
     * Relasi Teacher ke Nilai
     *
     * Setiap guru memiliki banyak nilai.
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'teacher_id'); // Relasi ke model Nilai
    }
}
