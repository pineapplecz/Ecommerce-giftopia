<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Giftopia')</title>
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

    .btn-main {
      background-color: #D84040;
      color: #FFFFFF;
    }

    .btn-main:hover {
      background-color: #8E1616;
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
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{ asset('logo.png') }}" alt="Logo Giftopia" style="height: 32px; width: 32px; margin-right: 10px;">
        <span class="fw-bold text-white">Giftopia</span>
      </a>
      <div class="d-flex">
        <a href="{{ route('keranjang.index') }}" class="btn btn-main">Keranjang</a>
      </div>
      
    </div>
  </nav>

  <!-- Konten Utama -->
  <main class="container py-4">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    <p>© {{ date('Y') }} Giftopia. Semua hak dilindungi.</p>
  </footer>

  <!-- Script tambahan atau JS lainnya -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
