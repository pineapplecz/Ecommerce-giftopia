@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Tombol kembali -->
      <div class="mt-4">
      <a href="javascript:history.back()" class="btn-back">Kembali</a>
    </div>

    <h1 class="my-4">Keranjang Belanja</h1>

    @php
        // Ambil cart dari session
        $cart = session('cart', []);
    @endphp

    @if(empty($cart))
        <p>Keranjang Anda kosong.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $produkId => $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>
                            <form action="{{ route('keranjang.update', $produkId) }}" method="POST" style="display:inline-flex;">
                                @csrf
                                @method('PUT')
                                <input type="number" name="jumlah" value="{{ $item['jumlah'] }}" min="1" style="width:60px; margin-right:5px;">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                            </form>
                        </td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.hapus', $produkId) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Harga -->
        <div class="d-flex justify-content-end mt-4">
            <h4>Total Harga: Rp {{ number_format($total_harga, 0, ',', '.') }}</h4>
        </div>

        <!-- Tombol Checkout -->
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('checkout.form') }}" class="btn btn-success">Checkout</a>
        </div>
    @endif
</div>
@endsection
