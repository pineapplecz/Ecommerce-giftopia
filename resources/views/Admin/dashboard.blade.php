@extends('layouts.admin')

@section('content')
    <div class="dashboard-section">
        <h2 class="text-xl font-bold">Dashboard Admin</h2>
        <p>Selamat datang, {{ session('name') }}!</p>
        <a href="/home" class="btn-dashboard btn-red">Logout</a>
    </div>

    <div class="dashboard-section">
        <h3 class="text-lg font-semibold">Kelola Kategori</h3>
        <a href="{{ route('kategori.index') }}" class="btn-dashboard btn-blue">Lihat Semua Kategori</a>
        <a href="{{ route('kategori.create') }}" class="btn-dashboard btn-green">Tambah Kategori</a>
    </div>

    <div class="dashboard-section">
        <h3 class="text-lg font-semibold">Kelola Produk</h3>
        <a href="{{ route('produk.index') }}" class="btn-dashboard btn-blue">Lihat Semua Produk</a>
        <a href="{{ route('produk.create') }}" class="btn-dashboard btn-green">Tambah Produk</a>
    </div>

    <div class="dashboard-section">
        <h3 class="text-lg font-semibold">Kelola Pesanan</h3>
        <a href="{{ route('admin.pesanan.index') }}" class="btn-dashboard btn-blue">Lihat Semua Pesanan</a>
        <a href="{{ route('admin.pesanan.create') }}" class="btn-dashboard btn-green">Tambah Pesanan</a>
    </div>
@endsection
