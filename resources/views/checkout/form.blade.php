@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Checkout</h1>

    <!-- Form untuk mengisi data pengiriman -->
 <form action="{{ route('checkout.proses') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Penerima</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat Pengiriman</label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
    </div>

    <div class="form-group">
        <label for="telepon">Nomor Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Selesai</button>
</form>

</div>
@endsection
