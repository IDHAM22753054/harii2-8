<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(false){
            DB::table('students')->insert([
                    'name' => 'Julian',
                    'email' => 'juian@gmail.com',
                    'phone' => '00823729000',
                    'class' => '6',
                    'address' => 'Lampung',
                    'gender' => 'L',
                    'status' => 'Aktif',
                    'created_at' => now(),
                    'updated_at' => now(),
            ]);
        }
    }
}
