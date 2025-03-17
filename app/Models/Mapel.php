<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model ini
    protected $table = 'mapels'; // Nama tabel di database

    /**
     * Atribut yang dapat diisi (Mass Assignment)
     *
     * @var array
     */
    protected $fillable = [
        'name', // Nama mata pelajaran
    ];

    /**
     * Relasi Mapel ke Nilai
     *
     * Setiap mata pelajaran memiliki banyak nilai
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'mapel_id');
    }
}
