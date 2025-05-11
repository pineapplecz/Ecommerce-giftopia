@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Data Pesanan</h2>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama Penerima</th>
                <th class="border px-4 py-2">Alamat Penerima</th>
                <th class="border px-4 py-2">No. HP Penerima</th>
                <th class="border px-4 py-2">Total Harga</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $p)
            <tr>
                <td class="border px-4 py-2">{{ $p->id }}</td>
                <td class="border px-4 py-2">{{ $p->nama_penerima }}</td>
                <td class="border px-4 py-2">{{ $p->alamat_penerima }}</td>
                <td class="border px-4 py-2">{{ $p->no_hp_penerima }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
