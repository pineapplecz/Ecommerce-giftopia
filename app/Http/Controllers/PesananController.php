<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pesanan;
use App\Models\PesananItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PesananController extends Controller
{
    // Proses checkout
    public function prosesCheckout(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Ambil keranjang belanja dari session
        $keranjang = Session::get('cart', []);

        // Cek apakah keranjang kosong
        if (empty($keranjang)) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang tidak boleh kosong!');
        }

        // Ambil ID user yang login
        $userId = session('user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu');
        }

        // Buat pesanan baru
        $pesanan = Pesanan::create([
            'user_id' => $userId,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'total_harga' => array_sum(array_column($keranjang, 'subtotal')),
        ]);

        // Simpan detail item pesanan
        foreach ($keranjang as $item) {
            PesananItem::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $item['id'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
            ]);
        }

        // Simpan data checkout ke session untuk digunakan di struk
        $dataCheckout = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'item' => $keranjang,
            'total' => array_sum(array_column($keranjang, 'subtotal')),
            'id' => $pesanan->id,
        ];

        Session::put('data_checkout', $dataCheckout);

        // Redirect ke halaman untuk menampilkan struk
        return redirect()->route('checkout.struk');
    }

    // Fungsi untuk cetak struk pesanan
    public function cetakStruk($id)
    {
        // Ambil pesanan beserta detail itemnya
        $pesanan = Pesanan::with('detailPesanan.produk')->findOrFail($id);

        // Generate PDF dengan view 'checkout.struk_pdf'
        $pdf = Pdf::loadView('checkout.struk_pdf', compact('pesanan'));

        // Download file PDF
        return $pdf->download('struk-pesanan-'.$pesanan->id.'.pdf');
    }
}
