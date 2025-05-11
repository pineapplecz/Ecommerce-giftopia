@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Kelola Kategori</h2>

      <a href="{{ route('kategori.create') }}" class="btn btn-main mb-3">+ Tambah kategori</a>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
            <tr>
                <td class="border px-4 py-2">{{ $kategori->id }}</td>
                <td class="border px-4 py-2">{{ $kategori->nama }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
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
