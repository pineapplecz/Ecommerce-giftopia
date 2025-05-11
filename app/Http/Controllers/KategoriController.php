<?php

namespace App\Http\Controllers;
use App\Models\Produk; // Gunakan model Produk
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('admin.kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Membuat slug dari nama kategori
        $validasi['slug'] = Str::slug($request->nama);

        // Menyimpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/kategori'), $namaGambar);
            $validasi['gambar'] = $namaGambar;
        }

        Kategori::create($validasi);

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    // Memperbarui kategori
    public function update(Request $request, Kategori $kategori)
    {
        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validasi['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
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

    // Menghapus kategori
    public function destroy(Kategori $kategori)
    {
        // Menghapus gambar jika ada
        if ($kategori->gambar) {
            $jalurGambar = public_path('images/kategori/' . $kategori->gambar);
            if (file_exists($jalurGambar)) {
                unlink($jalurGambar);
            }
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil dihapus');
    }

    // Menampilkan produk berdasarkan kategori
    public function show($id)
    {
        // Mengambil kategori berdasarkan ID
        $kategori = DB::table('kategoris')->where('id', $id)->first();

        // Jika kategori tidak ditemukan
        if (!$kategori) {
            return redirect('/home')->withErrors(['msg' => 'Kategori tidak ditemukan']);
        }

        // Mengambil produk yang terkait dengan kategori ini
        $produks = DB::table('produks')->where('kategori_id', $id)->get();

        // Kembalikan tampilan dengan data kategori dan produk
        return view('kategori.show', ['kategori' => $kategori, 'produks' => $produks]);
    }
}
