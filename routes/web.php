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
        session([
            'role' => 'user',
            'user_id' => $user->id,
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
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::get('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
// Admin dashboard, hanya untuk admin
Route::get('/admin/dashboard', function () {
    if (session('role') !== 'admin') {
        return redirect('/login');
    }
    return view('admin.dashboard');
});

// ========== Fitur User ========== 
Route::group(['middleware' => 'auth.custom'], function () {
    // Hanya fitur yang perlu login yang dikelompokkan di sini
    Route::get('/checkout', [PesananController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [PesananController::class, 'checkout'])->name('checkout.store');
    Route::get('/struk/{id}', [PesananController::class, 'struk'])->name('struk');
});

// ========== Admin Pesanan ========== 
Route::get('/admin/pesanan', function () {
    if (session('role') !== 'admin') {
        return redirect('/login');
    }
    return view('admin.pesanan.index');
})->name('admin.pesanan.index');

Route::post('/admin/pesanan/{id}/ubah-status', function ($id) {
    if (session('role') !== 'admin') {
        return redirect('/login');
    }
    // Logika untuk mengubah status pesanan
    return redirect()->route('admin.pesanan.index');
})->name('admin.pesanan.ubahStatus');

// Kategori route
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');

// Middleware kustom untuk pengecekan session
Route::middleware('auth.custom')->group(function () {
    // Tambahkan rute yang hanya bisa diakses oleh pengguna yang sudah login
});
