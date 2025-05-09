@extends('layouts.admin')

@section('content')
    <h1>Daftar Pesanan</h1>
    
    @foreach ($pesanans as $pesanan)
        <div>
            <p>Nama Pembeli: {{ $pesanan->user->name }}</p>
            <p>Status: {{ $pesanan->status }}</p>
            <form action="{{ route('admin.pesanan.ubahStatus', $pesanan->id) }}" method="POST">
                @csrf
                @method('POST')
                <select name="status">
                    <option value="diproses" {{ $pesanan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="dikirim" {{ $pesanan->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button type="submit">Update Status</button>
            </form>
        </div>
    @endforeach
@endsection
