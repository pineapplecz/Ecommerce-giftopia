<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Pesanan;  // Pastikan kamu mengimpor model Pesanan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController2 extends Controller
{
    public function index()
    {
        // Cek login dan role admin manual
        if (session('role') !== 'admin') {
            return redirect('/login');
        }

        // Ambil data pesanan + user
        $pesanan = DB::table('pesanans')
            ->join('users', 'pesanans.user_id', '=', 'users.id')
            ->select('pesanans.*', 'users.name as user_name')
            ->orderBy('pesanans.created_at', 'desc')
            ->get();

        return view('admin.pesanan.index', compact('pesanan'));
    }
}
