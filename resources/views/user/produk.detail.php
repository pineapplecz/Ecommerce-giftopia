@extends('layouts.app') <!-- Sesuaikan dengan layout utama kamu -->

@section('content')
<div class="container mt-5">
  <div class="row">
    <!-- Gambar Produk -->
    <div class="col-md-6">
      <img src="{{ asset('produk_images/'.$produk->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $produk->nama }}">
    </div>

    <!-- Detail Produk -->
    <div class="col-md-6">
      <h2 class="fw-bold">{{ $produk->nama }}</h2>
      <p class="text-muted">Kategori: {{ $produk->kategori->nama }}</p>
      <h4 class="text-danger mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h4>

      <p class="mb-4">{{ $produk->deskripsi }}</p>

      <!-- Form untuk menambah produk ke keranjang -->
      <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="quantity" class="form-label">Jumlah:</label>
          <input type="number" name="jumlah" id="quantity" class="form-control w-25" value="1" min="1">
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-cart-plus me-1"></i> Tambah ke Keranjang
        </button>
      </form>
    </div>
  </div>

  <!-- Produk Terkait -->
  <div class="row mt-5">
    <h4>Produk Lainnya dari Kategori {{ $produk->kategori->nama }}</h4>
    @foreach ($relatedProduks as $item)
      <div class="col-md-3 mb-4">
        <div class="card h-100">
          <img src="{{ asset('produk_images/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
          <div class="card-body">
            <h6 class="card-title">{{ $item->nama }}</h6>
            <p class="text-danger fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
            <a href="{{ route('produk.detail', $item->id) }}" class="btn btn-outline-secondary w-100 btn-sm">Lihat</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
