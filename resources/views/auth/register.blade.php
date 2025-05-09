<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar | Giftopia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #EEEEEE;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      height: 100vh;
      display: flex;
    }

    .login-container {
      display: flex;
      width: 100%;
      height: 100%;
    }

    .left-side {
      flex: 1;
      background: url('{{ asset('background1.png') }}') center/cover no-repeat;
    }

    .right-side {
      flex: 1;
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
    }

    .login-box {
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      color: #8E1616;
      text-align: center;
      margin-bottom: 24px;
      font-weight: bold;
    }

    .form-control {
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      margin-bottom: 16px;
    }

    .btn-main {
      background-color: #D84040;
      color: #fff;
      border: none;
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      margin-top: 8px;
      transition: background-color 0.3s ease;
    }

    .btn-main:hover {
      background-color: #8E1616;
    }

    .social-login {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 24px;
    }

    .social-login a img {
      width: 36px;
      height: 36px;
      transition: transform 0.2s;
    }

    .social-login a:hover img {
      transform: scale(1.1);
    }

    .text-center-small {
      font-size: 14px;
      margin-top: 20px;
    }

    @media (max-width: 768px) {
      .left-side {
        display: none;
      }

      .right-side {
        flex: 1;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

<div class="login-container">
  <!-- Left Image -->
  <div class="left-side"></div>

  <!-- Right Form -->
  <div class="right-side">
    <div class="login-box">
      <h2>Daftar Akun</h2>

      @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first('msg') }}</div>
      @endif

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" required>
        <input name="email" type="email" class="form-control" placeholder="Email" required>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password" required>

        <button type="submit" class="btn btn-main">Daftar</button>
      </form>

      <div class="text-center-small">Atau daftar dengan:</div>
      <div class="social-login">
        <a href="#"><img src="{{ asset('14.png') }}" alt="Daftar Google"></a>
        <a href="#"><img src="{{ asset('15.png') }}" alt="Daftar Facebook"></a>
        <a href="#"><img src="{{ asset('16.png') }}" alt="Daftar Apple"></a>
      </div>

      <div class="text-center-small mt-3">Sudah punya akun?</div>
      <a href="{{ route('login') }}">
        <button class="btn btn-outline-dark mt-2 w-100">Login</button>
      </a>
    </div>
  </div>
</div>

</body>
</html>
