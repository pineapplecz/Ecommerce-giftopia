<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // Tampilkan isi keranjang
    public function index()
    {
        $cart = session('cart', []);

        $total_harga = array_sum(array_column($cart, 'subtotal'));

        return view('keranjang.index', compact('cart', 'total_harga'));
    }

    // Tambahkan produk ke keranjang
  public function tambah(Request $request, $produkId)
{
    $produk = \App\Models\Produk::find($produkId);

    if (!$produk) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan.']);
        }
        return back()->withErrors(['msg' => 'Produk tidak ditemukan']);
    }

    $jumlah = $request->input('jumlah', 1);
    $cart = session()->get('cart', []);

    if (isset($cart[$produkId])) {
        $cart[$produkId]['jumlah'] += $jumlah;
        $cart[$produkId]['subtotal'] = $cart[$produkId]['jumlah'] * $produk->harga;
    } else {
        $cart[$produkId] = [
            'produk_id' => $produk->id,
            'nama' => $produk->nama,
            'harga' => $produk->harga,
            'jumlah' => $jumlah,
            'subtotal' => $jumlah * $produk->harga,
        ];
    }

    session()->put('cart', $cart);

    // Tangani response AJAX
    if ($request->ajax()) {
        return response()->json(['success' => true]);
    }

    // Fallback jika bukan AJAX
    return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
}


    // Perbarui jumlah produk di keranjang
    public function update(Request $request, $produkId)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $cart = session('cart', []);

        if (isset($cart[$produkId])) {
            $cart[$produkId]['jumlah'] = $request->jumlah;
            $cart[$produkId]['subtotal'] = $request->jumlah * $cart[$produkId]['harga'];

            session()->put('cart', $cart);

            return redirect()->route('keranjang.index')->with('success', 'Jumlah item diperbarui.');
        }

        return redirect()->route('keranjang.index')->with('error', 'Item tidak ditemukan di keranjang.');
    }

    // Hapus produk dari keranjang
    public function hapus($produkId)
    {
        $cart = session('cart', []);

        if (isset($cart[$produkId])) {
            unset($cart[$produkId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('keranjang.index')->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}
