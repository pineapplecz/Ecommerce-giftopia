<?php 
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dari database
        $kategoris = Kategori::all();
        $produks = Produk::latest()->take(6)->get();
        // Kirim data ke view
        return view('user.dashboard', compact('kategoris','produks'));
    }
}
