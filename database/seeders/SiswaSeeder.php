<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        Siswa::create([
            'nama' => 'Ahmad Fauzi',
            'nis' => '12345',
            'kelas' => 'XII IPA 1',
            'alamat' => 'Jakarta'
        ]);

       
    }
}
