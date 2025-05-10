@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Struk Pembelian</h1>
        
        <!-- Menampilkan data pesanan -->
        <p><strong>Nama:</strong> {{ $dataCheckout['nama'] }}</p>
        <p><strong>Alamat:</strong> {{ $dataCheckout['alamat'] }}</p>
        <p><strong>Telepon:</strong> {{ $dataCheckout['telepon'] }}</p>
        <p><strong>Total Harga:</strong> {{ number_format($dataCheckout['total'], 0, ',', '.') }}</p>

        <h3>Detail Pesanan:</h3>
        @if(isset($dataCheckout['item']) && is_array($dataCheckout['item']) && count($dataCheckout['item']) > 0)
            <ul>
                @foreach ($dataCheckout['item'] as $item)
                    <li>{{ $item['nama'] }} - {{ number_format($item['harga'], 0, ',', '.') }} x {{ $item['jumlah'] }} = {{ number_format($item['subtotal'], 0, ',', '.') }}</li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada item dalam pesanan.</p>
        @endif

        <!-- Tombol untuk cetak struk -->
        <button onclick="window.print()">Cetak Struk</button>
    </div>
@endsection
