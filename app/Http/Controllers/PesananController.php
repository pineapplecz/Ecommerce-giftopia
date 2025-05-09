<?php
namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananItem;
use App\Models\Keranjang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
        ]);

        $user = auth()->user();
        $user->alamat = $request->alamat;
        $user->save();

        $keranjang = Keranjang::where('user_id', auth()->id())->get();
        $total = $keranjang->sum(fn($item) => $item->produk->harga * $item->jumlah);

        $pesanan = Pesanan::create([
            'user_id' => auth()->id(),
            'total_harga' => $total,
            'status' => 'diproses',
            'alamat_pengiriman' => $user->alamat,
        ]);

        foreach ($keranjang as $item) {
            PesananItem::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'harga_satuan' => $item->produk->harga,
            ]);
        }

        Keranjang::where('user_id', auth()->id())->delete();

        return redirect()->route('struk', $pesanan->id);
    }


}