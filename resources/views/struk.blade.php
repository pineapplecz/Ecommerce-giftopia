@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Struk Pesanan</h3>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>No. Pesanan:</strong> #{{ $pesanan->id }}</p>
            <p><strong>Status:</strong> {{ ucfirst($pesanan->status) }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
            <p><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    <h5>Detail Produk:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan->detailPesanan as $detail)
            <tr>
                <td>{{ $detail->produk->nama }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($detail->jumlah * $detail->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
</div>
@endsection
