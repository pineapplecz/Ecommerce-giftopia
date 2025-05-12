@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Tambah Kategori</h2>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
            <label for="nama" class="block text-sm font-medium">Nama Kategori</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama kategori" required>
        </div>

        <button type="submit" class="btn btn-main">Simpan</button>
    </form>
@endsection
