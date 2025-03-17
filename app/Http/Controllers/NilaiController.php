<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa; // Ganti Student menjadi Siswa
use App\Models\Teacher; 
use App\Models\Mapel;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Menampilkan daftar nilai
    public function index()
    {
        // Ambil semua data nilai beserta relasi dengan siswa, guru, dan mata pelajaran
        $nilais = Nilai::with(['student', 'teacher', 'mapel'])->get(); // Ganti 'siswa' dan 'teacher' sesuai nama relasi

        return view('backend.nilai.index', compact('nilais')); // Mengirim data ke view index
    }

    // Menampilkan form untuk membuat nilai baru
    public function create()
    {
        // Ambil data siswa, guru, dan mata pelajaran untuk ditampilkan di form
        $siswa = Siswa::all(); // Ganti 'students' dengan 'siswa'
        $teachers = Teacher::all(); // Ganti 'guru' dengan 'teacher'
        $mapels = Mapel::all();

        return view('backend.nilai.create', compact('siswa', 'teachers', 'mapels')); // Mengirim data ke form
    }

    // Menyimpan nilai baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'student_id' => 'required|exists:students,id', // Ganti 'siswas' menjadi 'students'
            'teacher_id' => 'required|exists:teacher,id', // Tetap 'teachers'
            'mapel_id' => 'required|exists:mapels,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        // Simpan data nilai ke database
        Nilai::create([
            'student_id' => $request->student_id, // Ganti 'siswa_id' dengan 'student_id'
            'teacher_id' => $request->teacher_id,
            'mapel_id' => $request->mapel_id,
            'nilai' => $request->nilai,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nilai')->with('success', 'Nilai berhasil disimpan');
    }

    // Menampilkan form untuk mengedit nilai
    public function edit($id)
    {
        // Ambil data nilai berdasarkan ID
        $nilai = Nilai::findOrFail($id);

        // Ambil data siswa, guru, dan mata pelajaran
        $siswa = Siswa::all(); // Ganti 'students' dengan 'siswa'
        $teachers = Teacher::all(); // Ganti 'guru' dengan 'teacher'
        $mapels = Mapel::all();

        return view('backend.nilai.edit', compact('nilai', 'siswa', 'teachers', 'mapels')); // Mengirim data ke form edit
    }

    // Mengupdate data nilai
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'student_id' => 'required|exists:students,id', // Ganti 'siswas' menjadi 'students'
            'teacher_id' => 'required|exists:teacher,id', // Tetap 'teachers'
            'mapel_id' => 'required|exists:mapels,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        // Cari dan update nilai berdasarkan ID
        $nilai = Nilai::findOrFail($id);
        $nilai->update([
            'student_id' => $request->student_id, // Ganti 'siswa_id' dengan 'student_id'
            'teacher_id' => $request->teacher_id,
            'mapel_id' => $request->mapel_id,
            'nilai' => $request->nilai,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nilai')->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id); // Menemukan mata pelajaran berdasarkan ID
        $nilai->delete();

        return redirect()->route('nilai')->with('success', 'Nilai berhasil dihapus!');
    }
}
