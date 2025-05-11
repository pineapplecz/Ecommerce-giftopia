@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Keranjang Belanja & Isi Biodata</h3>

    <!-- Tampilkan Daftar Belanja -->
    <h5>Daftar Belanja:</h5>
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
            @php $total = 0; @endphp
            @foreach ($keranjang as $item)
                @php
                    $subtotal = $item['jumlah'] * $item['harga'];
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total: </strong> Rp {{ number_format($total, 0, ',', '.') }}</p>

    <!-- Form Isi Biodata -->
    <h5>Isi Biodata Penerima:</h5>
    <form action="{{ route('checkout.proses') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_penerima">Nama Penerima</label>
            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
        </div>

        <div class="form-group">
            <label for="alamat_penerima">Alamat Penerima</label>
            <textarea class="form-control" id="alamat_penerima" name="alamat_penerima" required></textarea>
        </div>

        <div class="form-group">
            <label for="no_hp_penerima">Nomor HP Penerima</label>
            <input type="text" class="form-control" id="no_hp_penerima" name="no_hp_penerima" required>
        </div>

        <div class="form-group mt-3">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="">-- Pilih Metode --</option>
                <option value="cod">Bayar di Tempat (COD)</option>
                <option value="transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Proses Checkout</button>
    </form>
</div>
@endsection
