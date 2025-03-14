<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSiswaRequest; // Memperbaiki penulisan use statement

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil nilai pencarian dari input
        $search = $request->input('search');

        // Jika ada pencarian, filter berdasarkan nama, email, atau phone
        if ($search) {
            $students = DB::table('students')
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->paginate(3); // Gunakan pagination
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $students = DB::table('students')->paginate(10); // Dengan pagination
        }

        return view('backend.siswa.index', compact('students'));
    }

    // Menampilkan form untuk membuat siswa baru
    public function create()
    {
        return view('backend.siswa.create');
    }

    // Menyimpan data siswa baru
    public function store(StoreSiswaRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/images'), $imageName); // Save to public/images directory
        
            $imagePath = 'images/' . $imageName; // The image path relative to the public directory
        } else {
            $imagePath = null;
        }

        DB::table('students')->insert([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'addres' => $validatedData['addres'], // Menyimpan addres
            'gender' => $validatedData['gender'], // Menyimpan gender
            'status' => $validatedData['status'], // Menyimpan status
            'class' => $validatedData['class'], // Menyimpan class
            'image' => $imagePath, // Menyimpan path gambar
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit data siswa
    public function edit($id)
    {
        $siswa = DB::table('students')->find($id);
        return view('backend.siswa.edit', compact('siswa'));
    }

    // Mengupdate data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'addres' => 'nullable|string|max:500', // Validasi addres (address)
            'gender' => 'nullable|in:male,female', // Validasi gender
            'status' => 'nullable|in:active,inactive', // Validasi status
            'class' => 'nullable|string|max:50', // Validasi class
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $siswa = DB::table('students')->find($id);

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($siswa->image && Storage::exists('public/' . $siswa->image)) {
                Storage::delete('public/' . $siswa->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $siswa->image = $imagePath; // Update gambar
        }

        // Simpan perubahan
        DB::table('students')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'addres' => $request->addres,
            'gender' => $request->gender,
            'status' => $request->status,
            'class' => $request->class,
            'image' => $request->image ?? $siswa->image, // Menghindari overwrite gambar jika kosong
            'updated_at' => now(),
        ]);

        return redirect()->route('siswa.')->with('success', 'Siswa berhasil diperbarui!');
    }

    // Menghapus siswa
    public function destroy($id)
    {
        $siswa = DB::table('students')->find($id);

        // Hapus gambar jika ada
        if ($siswa->image) {
            $imagePath = public_path('images/' . $siswa->image); // Get the full path of the image

            if (file_exists($imagePath)) { // Check if the file exists
                unlink($imagePath); // Delete the image file
            }
        }

        DB::table('students')->where('id', $id)->delete();

        return redirect()->route('siswa')->with('success', 'Siswa berhasil dihapus!');
    }
}
