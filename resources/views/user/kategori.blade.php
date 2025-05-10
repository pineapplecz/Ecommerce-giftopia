@extends('layouts.app') <!-- atau sesuaikan dengan layout kamu -->

@section('content')
<div class="container mt-5">
  <h2 class="mb-4 text-center">Produk: {{ $kategori->name }}</h2>
  <div class="row g-4">
    @forelse ($produks as $produk)
    <div class="col-md-4">
      <div class="card kategori-card">
        <a href="{{ route('produk.detail', ['id' => $produk->id]) }}">
          <img src="{{ asset('produk_images/'.$produk->image) }}" class="card-img-top" alt="{{ $produk->nama }}">
        </a>
        <div class="card-body">
          <h5 class="card-title">{{ $produk->nama }}</h5>
          <p class="card-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
          <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
            @csrf
            <input type="hidden" name="jumlah" value="1">
            <button type="submit" class="btn btn-main">Tambah ke Keranjang</button>
          </form>
        </div>
      </div>
    </div>
    @empty
    <p class="text-center">Belum ada produk di kategori ini.</p>
    @endforelse
  </div>
</div>
@endsection
