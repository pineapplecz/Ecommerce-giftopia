<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\Admin\PesananController2;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CheckoutController;

// ========== Halaman Utama ========== 
Route::get('/home', fn() => view('home'))->name('home');

// ========== Auth ========== 
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

// Proses login manual
Route::post('/login', function (Request $request) {
    $email = $request->email;
    $password = $request->password;

    // Login Admin manual
    if ($email === 'admin' && $password === 'admin') {
        session([
            'role' => 'admin',
            'name' => 'Admin'
        ]);
        return redirect('/admin/dashboard');
    }

    // Login user dari database
    $user = DB::table('users')->where('email', $email)->first();
    if ($user && Hash::check($password, $user->password)) {
        // Menyimpan data pengguna ke session setelah login berhasil
        session([
            'role' => 'user',
            'user_id' => $user->id,  // Pastikan user_id ada di session
            'name' => $user->name
        ]);
        return redirect('/dashboard');
    }

    return back()->withErrors(['msg' => 'Login gagal']);
})->name('login');

// Proses register
Route::post('/register', function (Request $request) {
    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return redirect('/login');
})->name('register.store');

// Logout
Route::post('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');

// ========== Dashboard ========== 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ========== Keranjang ========== 
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah/{produk}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
Route::put('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');

// ========== Admin Routes ========== 
Route::middleware('auth.custom')->prefix('admin')->group(function () {

    // Admin Dashboard, hanya untuk admin
    Route::get('/dashboard', function () {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        return view('admin.dashboard');
    });

    // Admin Pesanan
    Route::get('/pesanan', function () {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        return view('admin.pesanan.index');
    })->name('admin.pesanan.index');

    Route::post('/pesanan/{id}/ubah-status', function ($id) {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        // Logika untuk mengubah status pesanan
        return redirect()->route('admin.pesanan.index');
    })->name('admin.pesanan.ubahStatus');
});

// ========== Kategori dan Produk ========== 
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.detail');

// ========== Checkout ========== 
Route::get('/checkout', [CheckoutController::class, 'tampilForm'])->name('checkout.form');
Route::post('/checkout', [CheckoutController::class, 'prosesCheckout'])->name('checkout.proses');
Route::get('/checkout/struk', [CheckoutController::class, 'tampilStruk'])->name('checkout.struk');


// Middleware kustom untuk pengecekan session
Route::middleware('auth.custom')->group(function () {
    // Tambahkan rute yang hanya bisa diakses oleh pengguna yang sudah login
});
