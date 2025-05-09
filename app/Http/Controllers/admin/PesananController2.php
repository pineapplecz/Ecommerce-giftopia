<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController2 extends Controller
{
    // Menampilkan daftar pesanan untuk admin
    public function index()
    {
        // Mengambil semua pesanan dengan relasi user
        $pesanans = Pesanan::with('user')->latest()->get();

        // Mengembalikan view dengan data pesanan
        return view('admin.pesanan.index', compact('pesanans'));
    }

    // Mengubah status pesanan
    public function ubahStatus(Request $request, $id)
    {
        // Mencari pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);

        // Memperbarui status pesanan
        $pesanan->update(['status' => $request->status]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Status pesanan diperbarui');
    }
}
