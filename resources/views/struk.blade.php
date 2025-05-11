<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Pesanan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Struk Pesanan #{{ $pesanan->id }}</h2>
    <p><strong>Status:</strong> {{ ucfirst($pesanan->status) }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
    <p><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d M Y, H:i') }}</p>

    <h4>Detail Produk</h4>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan->detailPesanan as $item)
            <tr>
                <td>{{ $item->produk->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
    <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Kembali ke Beranda</a>
    <a href="{{ route('checkout.struk', $pesanan->id) }}" class="btn btn-success">Cetak Struk</a>
</div>

</body>
</html>
