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
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
    ]);

    $keranjang = Session::get('cart', []);

    $dataCheckout = [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
        'item' => $keranjang,
        'total' => array_sum(array_column($keranjang, 'subtotal')),
    ];

    // Simpan pesanan ke database
    $pesanan = new Pesanan();
    $pesanan->nama = $dataCheckout['nama'];
    $pesanan->alamat = $dataCheckout['alamat'];
    $pesanan->telepon = $dataCheckout['telepon'];
    $pesanan->total_harga = $dataCheckout['total'];
    $pesanan->save();

    // Simpan data checkout ke session
    Session::put('data_checkout', $dataCheckout);

    return redirect()->route('checkout.struk');
}
public function tampilStruk()
{
    // Ambil data checkout dari session
    $dataCheckout = Session::get('data_checkout');

    // Periksa apakah dataCheckout ada dan valid
    if (!$dataCheckout) {
        // Jika tidak ada data checkout di session, arahkan kembali ke halaman checkout
        return redirect()->route('checkout.form')->withErrors(['msg' => 'Data checkout tidak ditemukan']);
    }

    // Simpan pesanan ke dalam database (jika diperlukan)
    $pesanan = new Pesanan();
    $pesanan->nama = $dataCheckout['nama'];
    $pesanan->alamat = $dataCheckout['alamat'];
    $pesanan->telepon = $dataCheckout['telepon'];
    $pesanan->total_harga = $dataCheckout['total'];
    $pesanan->save();  // Simpan pesanan baru ke database

    // Kirim data ke view untuk ditampilkan
    return view('struk', compact('dataCheckout', 'pesanan'));
}
}