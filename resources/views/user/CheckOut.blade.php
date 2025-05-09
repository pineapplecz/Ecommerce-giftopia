@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="alamat">Alamat Pengiriman</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Konfirmasi Pembelian</button>
        </form>
    </div>
@endsection
