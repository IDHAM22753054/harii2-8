<?php

namespace App\Http\Controllers;

use App\Models\Mapel; // Pastikan Anda sudah membuat model Mapel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables; // Pastikan DataTables sudah di-import

class MapelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datas = DB::table('mapels')->get();
            return Datatables::of($datas)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('backend.mapel.aksi', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
                
        }
        return view('backend.mapel.index');
    }


    public function create()
    {
        return view('backend.mapel.create');
    }

    /**
     * Menyimpan mata pelajaran yang baru dibuat.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Validasi untuk nama mapel
        ]);

        // Menyimpan data ke tabel mapels
        DB::table('mapels')->insert([
            'name' => $validatedData['name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id); // Menemukan mata pelajaran berdasarkan ID
        return view('backend.mapel.edit', compact('mapel'));
    }

    /**
     * Mengupdate data mata pelajaran.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $mapel = Mapel::findOrFail($id); // Menemukan mata pelajaran berdasarkan ID
        $mapel->name = $request->name;

        $mapel->save();

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil diperbarui!');
    }

    /**
     * Menghapus mata pelajaran.
     */
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id); // Menemukan mata pelajaran berdasarkan ID
        $mapel->delete();

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil dihapus!');
    }
}
