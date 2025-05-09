@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Keranjang Anda</h3>

    <!-- Tabel daftar produk dalam keranjang -->
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keranjangs as $id => $keranjang)
                <tr>
                    <td>{{ $keranjang['produk']->nama }}</td>
                    <td>{{ $keranjang['jumlah'] }}</td>
                    <td>Rp {{ number_format($keranjang['produk']->harga, 2) }}</td>
                    <td>Rp {{ number_format($keranjang['produk']->harga * $keranjang['jumlah'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: Rp {{ number_format($total, 2) }}</h4>

    <!-- Tombol Checkout -->
    <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
</div>
@endsection
