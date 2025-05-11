@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Kelola Produk</h2>

    <a href="{{ route('produk.create') }}" class="btn btn-main mb-3">+ Tambah Produk</a>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama Produk</th>
                <th class="border px-4 py-2">Kategori</th> <!-- Menambahkan kolom kategori -->
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
            <tr>
                <td class="border px-4 py-2">{{ $produk->id }}</td>
                <td class="border px-4 py-2">{{ $produk->nama }}</td>
                <td class="border px-4 py-2">
                    <!-- Menampilkan kategori berdasarkan kategori_id -->
                    {{ $produk->kategori ? $produk->kategori->nama : 'Kategori Tidak Ditemukan' }}
                </td>
                <td class="border px-4 py-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('produk.edit', $produk->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
