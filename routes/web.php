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
Route::get('/user/dashboard', function () {
    $kategori = DB::table('kategoris')->get(); // sesuaikan nama tabel
    return view('user.dashboard', compact('kategori'));
})->name('user.dashboard');

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    // Cek apakah session 'role' ada dan bernilai 'admin'
    if (session('role') !== 'admin') {
        return redirect('/login');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

// ========== Auth ========== 
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

// Proses login manual
Route::post('/login', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    // Login manual untuk admin
    if ($email === 'admin@gmail.com' && $password === 'admin') {
        session([
            'role' => 'admin',
            'name' => 'Admin'
        ]);
        return redirect()->route('admin.dashboard');
    }

    // Login user dari database
    $user = DB::table('users')->where('email', $email)->first();
    if ($user && Hash::check($password, $user->password)) {
        session([
            'role' => 'user',
            'user_id' => $user->id,
            'name' => $user->name
        ]);
        return redirect()->route('user.dashboard');
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

// ========== Keranjang ========== 
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah/{produk}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
Route::put('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');

// ========== Pesanan ========== 
Route::get('/admin/pesanan', function () {
    // Cek jika user bukan admin
    if (session('role') !== 'admin') {
        return redirect('/login');
    }
    return view('admin.pesanan.index'); // Halaman admin pesanan
})->name('admin.pesanan.index');

// ========== Kategori dan Produk ========== 
Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);

// ========== Checkout ========== 
Route::get('/checkout', [CheckoutController::class, 'tampilForm'])->name('checkout.form');
Route::post('/checkout', [CheckoutController::class, 'prosesCheckout'])->name('checkout.proses');
Route::get('/checkout/struk', [CheckoutController::class, 'tampilStruk'])->name('checkout.struk');

// Admin Pesanan Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Pesanan routes
    Route::get('/pesanan', [PesananController2::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/create', [PesananController2::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan', [PesananController2::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/{id}/edit', [PesananController2::class, 'edit'])->name('pesanan.edit');
    Route::put('/pesanan/{id}', [PesananController2::class, 'update'])->name('pesanan.update');
    Route::delete('/pesanan/{id}', [PesananController2::class, 'destroy'])->name('pesanan.destroy');

    // Kategori routes
    Route::resource('kategori', KategoriController::class);
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');


    // produk routes
    Route::resource('produk', ProdukController::class);
});


// Logout Route
Route::get('/logout', function () {
    session()->flush(); // Menghapus semua session
    return redirect('/login'); // Arahkan ke halaman login setelah logout
})->name('logout');

Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.detail');
