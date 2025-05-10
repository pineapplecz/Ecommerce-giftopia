<?php
namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananItem;
use App\Models\Keranjang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PesananController extends Controller
{
   public function prosesCheckout(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
    ]);

    // Ambil data keranjang
    $keranjang = Session::get('cart', []);

    // Ambil ID pengguna yang login
    $userId = session('user_id'); // ID pengguna yang login

    // Buat pesanan baru, simpan user_id dan informasi pengiriman
    $pesanan = Pesanan::create([
        'user_id' => $userId,  // ID pengguna yang login
        'nama' => $request->nama,  // Nama penerima (pengguna bisa memasukkan data lain selain mereka)
        'alamat' => $request->alamat,  // Alamat pengiriman
        'telepon' => $request->telepon,  // Nomor telepon penerima
        'total_harga' => array_sum(array_column($keranjang, 'subtotal')),  // Total harga
    ]);

    // Menyimpan data checkout di session
    $dataCheckout = [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
        'item' => $keranjang,
        'total' => array_sum(array_column($keranjang, 'subtotal')),
        'id' => $pesanan->id,   // Simpan ID pesanan yang baru dibuat
    ];

    Session::put('data_checkout', $dataCheckout);

    return redirect()->route('checkout.struk');
}
}