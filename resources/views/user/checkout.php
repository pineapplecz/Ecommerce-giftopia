@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Halaman Checkout</h2>
    <form method="POST" action="{{ route('checkout.proses') }}">
        @csrf
        <div>
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>
        </div>
        <div>
            <label>Alamat Lengkap</label>
            <textarea name="alamat" required></textarea>
        </div>
        <div>
            <label>Nomor Telepon</label>
            <input type="text" name="telepon" required>
        </div>

        <h4>Ringkasan Belanja</h4>
        <ul>
            @foreach($keranjang as $item)
                <li>{{ $item['name'] }} - {{ $item['quantity'] }} x Rp{{ number_format($item['price']) }} = Rp{{ number_format($item['subtotal']) }}</li>
            @endforeach
        </ul>
        <p><strong>Total Belanja: Rp{{ number_format(array_sum(array_column($keranjang, 'subtotal'))) }}</strong></p>

        <button type="submit">Lanjutkan Checkout</button>
    </form>
</div>
@endsection
