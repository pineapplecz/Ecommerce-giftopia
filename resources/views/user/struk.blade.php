<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian - {{ $pesanan->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .struk {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }
        .struk h1 {
            text-align: center;
            font-size: 24px;
        }
        .struk .item {
            display: flex;
            justify-content: space-between;
        }
        .struk .item + .item {
            border-top: 1px dashed #ddd;
            padding-top: 10px;
        }
        .struk .total {
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="struk">
        <h1>Struk Pembelian</h1>
        <p>Nomor Pesanan: {{ $pesanan->id }}</p>
        <p>Tanggal: {{ $pesanan->created_at->format('d M Y') }}</p>
        <div class="items">
            @foreach ($pesanan->items as $item)
                <div class="item">
                    <span>{{ $item->produk->nama }} x {{ $item->jumlah }}</span>
                    <span>Rp {{ number_format($item->harga_satuan * $item->jumlah, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>
        <div class="total">
            <span>Total Pembelian: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
        </div>
    </div>
</body>
</html>
