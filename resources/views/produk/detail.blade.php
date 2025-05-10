@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Nama Produk -->
        <h2 class="text-center mb-4">{{ $produk->nama }}</h2>

        <!-- Gambar Produk Besar -->
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$produk->gambar) }}" class="img-fluid" alt="{{ $produk->nama }}">
            </div>

            <!-- Deskripsi dan Harga Produk -->
            <div class="col-md-6">
                <h4 class="text-danger">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h4>
                <p>{{ $produk->deskripsi }}</p>

          <!-- Bagian ini adalah form untuk menambahkan produk ke keranjang -->
<form id="form-tambah-keranjang" action="{{ route('keranjang.tambah', ['produk' => $produk->id]) }}" method="POST">
    @csrf
    <input type="number" name="jumlah" value="1" min="1" class="form-control" style="width: 100px;">
    <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
</form>

<!-- Popup notifikasi -->
<div id="popup-notifikasi" style="display: none;" class="alert alert-success mt-3">
    Barang berhasil ditambahkan ke keranjang!
</div>

<!-- Script untuk menangani AJAX -->
<script>
    document.getElementById('form-tambah-keranjang').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form submit default
        
        var form = this;
        var formData = new FormData(form);

        // AJAX Request
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Cek jika berhasil
            if(data.success) {
                // Tampilkan notifikasi popup
                document.getElementById('popup-notifikasi').style.display = 'block';

                // Sembunyikan popup setelah 3 detik
                setTimeout(function() {
                    document.getElementById('popup-notifikasi').style.display = 'none';
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
        });
    });
</script>

        <!-- Produk Terkait -->
        <h3 class="mt-5">Produk Terkait</h3>
        <div class="row">
            @foreach ($relatedProduks as $item)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('produk.detail', $item->id) }}" class="btn btn-outline-secondary">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
