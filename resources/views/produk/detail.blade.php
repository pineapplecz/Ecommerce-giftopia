@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Nama Produk -->
    <h2 class="text-center mb-4">{{ $produk->nama }}</h2>

    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6">
            <img src="{{ asset('storage/'.$produk->gambar) }}" class="img-fluid" alt="{{ $produk->nama }}">
        </div>

        <!-- Info Produk -->
        <div class="col-md-6">
            <h4 class="text-danger">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h4>
            <p>{{ $produk->deskripsi }}</p>

            <!-- Form Tambah ke Keranjang -->
            <form id="form-tambah-keranjang" action="{{ route('keranjang.tambah', ['produk' => $produk->id]) }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" id="jumlah" value="1" min="1" class="form-control w-25">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
            </form>

            <!-- Notifikasi Berhasil -->
            <div id="popup-notifikasi" class="alert alert-success mt-3" style="opacity: 0; transition: opacity 0.5s ease;">
                Barang berhasil ditambahkan ke keranjang!
            </div>
        </div>
    </div>

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

<!-- Script AJAX + Notifikasi Fade -->
<script>
    document.getElementById('form-tambah-keranjang').addEventListener('submit', function (e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const notif = document.getElementById('popup-notifikasi');

                // Fade in
                notif.style.display = 'block';
                setTimeout(() => {
                    notif.style.opacity = 1;
                }, 10);

                // Fade out setelah 3 detik
                setTimeout(() => {
                    notif.style.opacity = 0;
                    setTimeout(() => {
                        notif.style.display = 'none';
                    }, 500);
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
        });
    });
</script>
@endsection
