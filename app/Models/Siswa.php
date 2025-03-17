<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model ini
    protected $table = 'students'; // Nama tabel di database

    /**
     * Atribut yang dapat diisi (Mass Assignment)
     *
     * @var array
     */
    protected $fillable = [
        'name',     // Sesuaikan dengan kolom di tabel
        'addres',   // Sesuaikan dengan kolom di tabel
        'email',    // Menambahkan email
        'phone',    // Menambahkan phone
        'class',    // Menambahkan class
        'image',    // Menambahkan image
        'gender',   // Menambahkan gender
        'status',   // Menambahkan status
    ];

    /**
     * Relasi Siswa ke Nilai
     *
     * Setiap siswa memiliki banyak nilai.
     */
    // public function nilais()
    // {
    //     return $this->hasMany(Nilai::class, 'student_id'); // Relasi ke model Nilai
    // }

    /**
     * Menambahkan konfigurasi timestamps untuk created_at dan updated_at.
     */
    public $timestamps = true;  // Secara default, Laravel akan mengelola `created_at` dan `updated_at`
}
