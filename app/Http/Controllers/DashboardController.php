<?php 
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
{
    $kategoris = DB::table('kategoris')->get();
    $produks = DB::table('produks')->get();

    return view('admin.dashboard', compact('kategoris', 'produks'));
}

}
