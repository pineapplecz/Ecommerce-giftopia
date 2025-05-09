<!-- resources/views/kategori/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $kategori->nama }}</h1>
        <p>{{ $kategori->deskripsi }}</p>

        <h3>Produk dalam Kategori</h3>
        <div class="row">
            @foreach ($produks as $item)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('keranjang.tambah', $item->id) }}" class="btn btn-primary">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('keranjang.index') }}" class="btn btn-success">Lihat Keranjang</a>
    </div>
@endsection
