<?php

namespace App\Http\Controllers;

use App\Models\Ziyadah;
use Illuminate\Http\Request;

class ZiyadahController extends Controller
{
    // Menampilkan daftar Ziyadah
    public function index()
    {
        $ziyadah = Ziyadah::all();  
        return view('ziyadah.index', compact('ziyadah'));
    }

    // Menampilkan form tambah Ziyadah
    public function create()
    {
        return view('ziyadah.create');
    }

    // Menyimpan data Ziyadah baru
    public function store(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'santri' => 'required|string|max:255', // Validasi untuk kolom santri
            'juz' => 'required|integer',
            'surat' => 'required|string|max:255',
            'ayat' => 'required|integer',
            'catatan' => 'nullable|string',
            'tanggal_ziyadah' => 'required|date',
        ]);

        // Menyimpan data Ziyadah baru ke dalam database
        Ziyadah::create([
            'santri' => $request->santri,          // Pastikan kolom santri diisi
            'juz' => $request->juz,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'catatan' => $request->catatan,
            'tanggal_ziyadah' => $request->tanggal_ziyadah,
        ]);

        // Setelah berhasil menyimpan, kembali ke halaman index
        return redirect()->route('ziyadah.index');
    }

    // Menampilkan form edit Ziyadah
    public function edit($id)
    {
        $ziyadah = Ziyadah::findOrFail($id);  
        return view('ziyadah.edit', compact('ziyadah'));
    }

    // Mengupdate data Ziyadah
    public function update(Request $request, $id)
    {
        // Validasi input dari user
        $request->validate([
            'santri' => 'required|string|max:255', // Validasi untuk kolom santri
            'juz' => 'required|integer',
            'surat' => 'required|string|max:255',
            'ayat' => 'required|integer',
            'catatan' => 'nullable|string',
            'tanggal_ziyadah' => 'required|date',
        ]);

        // Mengupdate data Ziyadah berdasarkan ID
        $ziyadah = Ziyadah::findOrFail($id);
        $ziyadah->update([
            'santri' => $request->santri,          // Pastikan kolom santri diupdate
            'juz' => $request->juz,
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'catatan' => $request->catatan,
            'tanggal_ziyadah' => $request->tanggal_ziyadah,
        ]);

        // Setelah berhasil mengupdate, kembali ke halaman index
        return redirect()->route('ziyadah.index');
    }

    // Menghapus data Ziyadah
    public function destroy($id)
    {
        Ziyadah::destroy($id);  // Menghapus data berdasarkan ID
        return redirect()->route('ziyadah.index');  // Setelah menghapus, kembali ke halaman index
    }
}

