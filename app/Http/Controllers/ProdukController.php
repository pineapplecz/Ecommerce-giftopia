<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'required|image',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $gambar = $request->file('gambar')->store('produk', 'public');

        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $gambar,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $gambar;
        }

        $produk->update($request->all());

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }

public function show($id)
{
    // Menarik data produk beserta kategori yang terkait
    $produk = Produk::with('kategori')->findOrFail($id);
    
    // Menarik produk terkait yang memiliki kategori yang sama, kecuali produk yang sedang ditampilkan
    $relatedProduks = Produk::where('kategori_id', $produk->kategori_id)
                            ->where('id', '!=', $produk->id)
                            ->limit(4)
                            ->get();

    // Mengembalikan tampilan produk detail dengan membawa data produk dan produk terkait
    return view('produk.detail', compact('produk', 'relatedProduks'));
}

}
