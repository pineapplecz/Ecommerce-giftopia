<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;

class KeranjangController extends Controller
{
    public function tambah(Request $request, $id)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Cek apakah produk sudah ada di keranjang (menggunakan session keranjang)
        $keranjang = session()->get('keranjang', []);

        // Cek apakah produk sudah ada dalam keranjang
        if (isset($keranjang[$id])) {
            // Jika sudah ada, tambahkan jumlahnya
            $keranjang[$id]['jumlah'] += $request->jumlah;
        } else {
            // Jika belum ada, tambahkan produk ke keranjang
            $keranjang[$id] = [
                'produk' => $produk,
                'jumlah' => $request->jumlah
            ];
        }

        // Simpan keranjang ke dalam session
        session()->put('keranjang', $keranjang);

        // Flash message untuk memberi tahu pengguna
        session()->flash('success', 'Barang berhasil dimasukkan ke keranjang.');

        // Redirect ke halaman keranjang
        return redirect()->route('keranjang.index');
    }

    public function index()
    {
        // Ambil keranjang dari session
        $keranjangs = session()->get('keranjang', []);
        $total = 0;

        // Hitung total harga
        foreach ($keranjangs as $keranjang) {
            $total += $keranjang['produk']->harga * $keranjang['jumlah'];
        }

        return view('keranjang.index', compact('keranjangs', 'total'));
    }
}
