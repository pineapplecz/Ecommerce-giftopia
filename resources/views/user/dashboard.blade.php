<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Giftopia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #EEEEEE;
      color: #1D1616;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: #8E1616;
    }

    .navbar a {
      color: #EEEEEE !important;
    }

    /* Styling for the cart */
    .cart-table td, .cart-table th {
      vertical-align: middle;
    }

    .cart-total {
      font-size: 1.25rem;
      font-weight: bold;
    }

    .btn-main {
      background-color: #D84040;
      color: #FFFFFF;
    }

    .btn-main:hover {
      background-color: #8E1616;
    }

    .navbar-brand img {
      height: 32px;
      width: 32px;
      margin-right: 10px;
    }

    .hero {
      background: #FFFFFF;
      color: rgb(0, 0, 0);
      padding: 60px 20px;
      text-align: center;
    }

    .promo-section {
      background-color: #FFFFFF;
      padding: 40px 20px;
    }

    .kategori-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .kategori-card:hover {
      transform: scale(1.02);
    }

    footer {
      background-color: #1D1616;
      color: #EEEEEE;
      text-align: center;
      padding: 20px 0;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/login">
        <img src="{{ asset('logo.png') }}" alt="Logo Giftopia">
        <span class="fw-bold text-white">Giftopia</span>
      </a>
      <div class="d-flex">
        <!-- Tombol Keranjang -->
        <a href="{{ route('keranjang.index') }}" class="btn btn-danger">Keranjang</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
          <h2 class="display-5">Selamat Datang di Giftopia</h2>
          <p class="lead">Temukan hadiah terbaik untuk orang tersayang hanya di Giftopia.</p>
          <a href="/login" class="btn btn-main mt-3">Belanja Sekarang</a>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ asset('orang.png') }}" alt="Orang memegang sayur" class="img-fluid" style="max-height: 350px;">
        </div>
      </div>
    </div>
  </section>

  <!-- Kategori Section -->
  <section class="promo-section" id="produk">
    <div class="container">
      <h3 class="text-center mb-4">Kategori Produk</h3>
      <div class="row g-4">
        @foreach ($kategoris as $kategori)
        <div class="col-md-4">
          <div class="card kategori-card">
            <img src="{{ asset('kategori_images/'.$kategori->image) }}" class="card-img-top" alt="{{ $kategori->name }}">
            <div class="card-body">
              <h5 class="card-title">{{ $kategori->name }}</h5>
              <p class="card-text">{{ $kategori->description }}</p>
              <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-main">Lihat Produk</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="promo-section" id="produk">
  <div class="container">
    <h3 class="text-center mb-4">Produk Terbaru</h3>
    <div class="row g-4">
      @foreach ($produks as $produk)
      <div class="col-md-4">
        <div class="card kategori-card">
          <img src="{{ asset('produk_images/'.$produk->image) }}" class="card-img-top" alt="{{ $produk->nama }}">
          <div class="card-body">
            <h5 class="card-title">{{ $produk->nama }}</h5>
            <p class="card-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
              @csrf
              <input type="hidden" name="jumlah" value="1">
              <button type="submit" class="btn btn-main">Tambah ke Keranjang</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

  <!-- Tentang Section -->
  <section id="tentang" class="promo-section">
    <div class="container">
      <h3 class="text-center">Tentang Kami</h3>
      <p class="text-center">Giftopia adalah platform kado yang unik dan personal.</p>
    </div>
  </section>

  <!-- Bantuan Section -->
  <section id="bantuan" class="promo-section">
    <div class="container">
      <h3 class="text-center">Bantuan</h3>
      <p class="text-center">Ada pertanyaan? Tim kami siap membantu.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Giftopia. Semua hak dilindungi.</p>
  </footer>

</body>
</html>
