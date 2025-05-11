<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    /* Tabel Styling */
    table {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #8E1616;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f8f8f8;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .btn-back {
      background-color: #8E1616;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }
<style>
    body {
        background-color: #F9F6F6;
        font-family: 'Segoe UI', sans-serif;
        color: #1D1616;
    }

    h2, h3 {
        color: #8E1616;
        margin-bottom: 0.5rem;
    }

    .dashboard-section {
        background-color: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .btn-dashboard {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .btn-red {
        background-color: #D84040;
        color: #fff;
    }

    .btn-red:hover {
        background-color: #8E1616;
    }

    .btn-green {
        background-color: #3BB77E;
        color: #fff;
    }

    .btn-green:hover {
        background-color: #2d8a5e;
    }

    .btn-blue {
        background-color: #4070F4;
        color: #fff;
    }

    .btn-blue:hover {
        background-color: #2b58c7;
    }

    hr {
        border: none;
        border-top: 2px solid #DDD;
        margin: 30px 0;
    }
    .btn-back:hover {
      background-color: #D84040;
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
    </div>
  </nav>

  <!-- Konten Utama -->
  <main class="container py-4">
    @yield('content')

    <!-- Tombol Kembali di bawah tabel -->
    <div class="mt-4">
      <a href="javascript:history.back()" class="btn-back">Kembali</a>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <p>© {{ date('Y') }} Giftopia. Semua hak dilindungi.</p>
  </footer>

</body>

</html>
