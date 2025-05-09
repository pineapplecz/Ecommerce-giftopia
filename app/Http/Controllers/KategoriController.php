<?php

namespace App\Http\Controllers;
use App\Models\produks;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validasi['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/kategori'), $namaGambar);
            $validasi['gambar'] = $namaGambar;
        }

        Kategori::create($validasi);

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validasi['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kategori->gambar) {
                $jalurGambarLama = public_path('images/kategori/' . $kategori->gambar);
                if (file_exists($jalurGambarLama)) {
                    unlink($jalurGambarLama);
                }
            }

            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/kategori'), $namaGambar);
            $validasi['gambar'] = $namaGambar;
        }

        $kategori->update($validasi);

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        // Hapus gambar jika ada
        if ($kategori->gambar) {
            $jalurGambar = public_path('images/kategori/' . $kategori->gambar);
            if (file_exists($jalurGambar)) {
                unlink($jalurGambar);
            }
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil dihapus');
    }

    // Frontend kategori
    public function show($id)
    {
        // Ambil data kategori berdasarkan ID
        $kategori = DB::table('kategoris')->where('id', $id)->first();

        // Jika kategori tidak ditemukan
        if (!$kategori) {
            return redirect('/home')->withErrors(['msg' => 'Kategori tidak ditemukan']);
        }

        // Ambil produks yang terkait dengan kategori ini (misalnya produks berada di tabel produks)
        $produks = DB::table('produks')->where('kategori_id', $id)->get();

        // Kembalikan ke view dengan data kategori dan produks
        return view('kategori.show', ['kategori' => $kategori, 'produks' => $produks]);
    }
}
