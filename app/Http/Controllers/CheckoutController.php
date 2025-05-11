<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pesanan;

class CheckoutController extends Controller
{
    public function tampilForm()
    {
        // Mengambil data keranjang dari session
        $keranjang = Session::get('cart', []);

        // Kirim data keranjang ke view
        return view('checkout.form', compact('keranjang'));
    }

    public function prosesCheckout(Request $request)
    {
        // Validasi data form checkout
        $request->validate([
            'nama_penerima' => 'required',
            'alamat_penerima' => 'required',
            'no_hp_penerima' => 'required',
        ]);

        $keranjang = Session::get('cart', []);
        $total = array_sum(array_column($keranjang, 'subtotal'));

        // Simpan ke tabel pesanan
        $pesanan = new Pesanan();
        $pesanan->user_id = session('user_id'); // pastikan ini ada
        $pesanan->nama_penerima = $request->nama_penerima;
        $pesanan->alamat_penerima = $request->alamat_penerima;
        $pesanan->no_hp_penerima = $request->no_hp_penerima;
        $pesanan->total_harga = $total;
        $pesanan->save();

        // Simpan detail produk
        foreach ($keranjang as $item) {
            $pesanan->detailPesanan()->create([
                'produk_id' => $item['produk_id'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
            ]);
        }

        // Simpan ke session untuk struk
        Session::put('data_checkout', [
            'pesanan_id' => $pesanan->id,
            'nama_penerima' => $request->nama_penerima,
            'alamat_penerima' => $request->alamat_penerima,
            'no_hp_penerima' => $request->no_hp_penerima,
            'total' => $total,
            'item' => $keranjang,
        ]);

        return redirect()->route('checkout.struk');
    }

    public function tampilStruk()
    {
        // Ambil data checkout dari session
        $dataCheckout = Session::get('data_checkout');

        if (!$dataCheckout || !isset($dataCheckout['pesanan_id'])) {
            return redirect()->route('checkout.form')->withErrors(['msg' => 'Data checkout tidak ditemukan']);
        }

        $pesanan = Pesanan::with('detailPesanan.produk')->findOrFail($dataCheckout['pesanan_id']);

        return view('struk', compact('dataCheckout', 'pesanan'));
    }
    
}
