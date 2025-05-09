<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class TransaksiController extends Controller 
{
    public function checkout(Request $request)
    {
        $user = auth()->user();
        $keranjangs = $user->keranjangs()->with('produk')->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kamu masih kosong!');
        }

        $total = $keranjangs->sum(function($item) {
            return $item->produk->harga * $item->jumlah;
        });

        $pesanan = Pesanan::create([
            'user_id' => $user->id,
            'status' => 'diproses',
            'total_harga' => $total
        ]);

        foreach ($keranjangs as $item) {
            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'harga' => $item->produk->harga
            ]);
        }

        // Kosongkan keranjang
        $user->keranjangs()->delete();

        return view('struk', compact('pesanan'));
    }
}
