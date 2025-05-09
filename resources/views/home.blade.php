
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Giftopia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #EEEEEE;
      color: #1D1616;
      font-family: 'Poppins', sans-serif;
    }
    .navbar {
      background-color: #8E1616;
    }

    .navbar a {
      color: #EEEEEE !important;
    }

    .navbar-brand img {
      height: 32px;
      width: 32px;
      margin-right: 10px;
    }

    /* Smooth Scroll Effect */
    html {
      scroll-behavior: smooth;
    }

    .navbar-nav .nav-link {
      position: relative;
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0%;
      height: 2px;
      background-color: #EEEEEE;
      transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::after {
      width: 100%;
    }

    .hero {
  background: url('{{ asset('bg.png') }}') no-repeat center center;
  background-size: cover;
  color: rgb(0, 0, 0);
  padding: 100px 20px;
  text-align: center;
  position: relative;
  z-index: 1;
}

    .promo-section {
      background-color: #FFFFFF;
      padding: 40px 20px;
    }

    .promo-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .promo-card:hover {
      transform: scale(1.02);
    }

    .btn-main {
      background-color: #D84040;
      color: #FFFFFF;
    }

    .btn-main:hover {
      background-color: #8E1616;
    }

    footer {
      background-color: #1D1616;
      color: #EEEEEE;
      text-align: center;
      padding: 20px 0;
      margin-top: 40px;
    }
    .floating-container {
  display: inline-block;
  position: relative;
}

.floating-img {
  width: 300px;
  animation: floatUpDown 3s ease-in-out infinite;
}

.promo-card img {
  width: 100%;
  height: auto;
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

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav align-items-center me-3">
        <li class="nav-item">
          <a class="nav-link text-white" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#produk">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#tentang">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#bantuan">Bantuan</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="/login" class="btn btn-main me-2">Login</a>
        <a href="/login" class="btn btn-outline-light">Daftar</a>
      </div>
    </div>
  </div>
</nav>


  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
          <h2 class="display-4" style="font-weight: 500;">Selamat Datang di Giftopia</h2>
          <p class="lead" style="font-size: 1rem;">Temukan hadiah terbaik untuk orang tersayang hanya di Giftopia dengan harga yang terjangkau.</p>
          <a href="/login" class="btn btn-main mt-3">Belanja Sekarang</a>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ asset('orang.png') }}" alt="Orang memegang sayur" class="img-fluid" style="max-height: 350px;">
        </div>
      </div>
    </div>
  </section>
<!-- Promo/Product Section -->
<section class="promo-section" id="produk">
  <div class="container">
    <h3 class="text-center mb-4">Promo Spesial Hari Ini</h3>

    <!-- Carousel Produk -->
    <div id="produkCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado1.jpg" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                  <h5 class="card-title">Cake</h5>
                  <p class="card-text">Macam-macam kue dengan rasa yang menggugah.</p>
                  <a href="/gift-box-aesthetic" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado2.jpg" class="card-img-top" alt="Produk 2">
                <div class="card-body">
                  <h5 class="card-title">Parcel Buah</h5>
                  <p class="card-text">Pilihan kado untuk pasangan, siap kirim hari ini.</p>
                  <a href="/kado-couple" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado3.jpg" class="card-img-top" alt="Produk 3">
                <div class="card-body">
                  <h5 class="card-title">Surprise Box</h5>
                  <p class="card-text">Isi surprise box bisa kamu sesuaikan sendiri.</p>
                  <a href="/surprise-box" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado 4.png" class="card-img-top" alt="Produk 4">
                <div class="card-body">
                  <h5 class="card-title">Gift Box Lux</h5>
                  <p class="card-text">Paket kado mewah dengan berbagai pilihan.</p>
                  <a href="/gift-box-lux" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado5.jpg" class="card-img-top" alt="Produk 5">
                <div class="card-body">
                  <h5 class="card-title">Kado Khusus</h5>
                  <p class="card-text">Kado yang dibuat khusus sesuai keinginan.</p>
                  <a href="/kado-khusus" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado6.jpg" class="card-img-top" alt="Produk 6">
                <div class="card-body">
                  <h5 class="card-title">Set Hadiah Ibu</h5>
                  <p class="card-text">Kado istimewa untuk ibu tercinta.</p>
                  <a href="/set-hadiah-ibu" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado7.jpg" class="card-img-top" alt="Produk 7">
                <div class="card-body">
                  <h5 class="card-title">Kado Hari Jadi</h5>
                  <p class="card-text">Hadiah untuk merayakan hari jadi istimewa.</p>
                  <a href="/kado-hari-jadi" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado8.jpg" class="card-img-top" alt="Produk 8">
                <div class="card-body">
                  <h5 class="card-title">Kado Wisuda</h5>
                  <p class="card-text">Kado terbaik untuk wisuda.</p>
                  <a href="/kado-wisuda" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card promo-card">
                <img src="kado9.jpg" class="card-img-top" alt="Produk 9">
                <div class="card-body">
                  <h5 class="card-title">Kado Pesta</h5>
                  <p class="card-text">Kado untuk acara pesta dan perayaan.</p>
                  <a href="/kado-pesta" class="btn btn-main">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Tombol Navigasi Slider -->
      <button class="carousel-control-prev" type="button" data-bs-target="#produkCarousel" data-bs-slide="prev" style="background-color: #D84040; color: #fff; width: 40px; height: 40px; border-radius: 50%; border: none; position: absolute; top: 50%; left: 5px; transform: translateY(-50%); display: flex; align-items: center; justify-content: center;">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#produkCarousel" data-bs-slide="next" style="background-color: #D84040; color: #fff; width: 40px; height: 40px; border-radius: 50%; border: none; position: absolute; top: 50%; right: 5px; transform: translateY(-50%); display: flex; align-items: center; justify-content: center;">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
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
<!-- Bootstrap JS (untuk carousel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
