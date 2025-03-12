<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teacher')->insert([
            'name' => 'Julian',
            'email' => 'july@gmail.com',
            'phone' => '00823729000',
            'course' => 'Mateatika',
            'address' => 'Lampung',
            'gender' => 'L',
            'status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
    ]);
    }
}
