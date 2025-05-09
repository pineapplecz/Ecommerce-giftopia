<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin | Giftopia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #EEEEEE;
      font-family: 'Segoe UI', sans-serif;
      color: #1D1616;
    }

    .login-container {
      max-width: 400px;
      margin: 80px auto;
      padding: 40px;
      background-color: #FFFFFF;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
    }

    .login-logo {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .login-logo img {
      height: 40px;
      width: 40px;
      margin-right: 10px;
    }

    .login-logo span {
      font-size: 22px;
      font-weight: bold;
      color: #8E1616;
    }

    .login-title {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #8E1616;
    }

    .login-error {
      color: #D84040;
      background-color: #fce4e4;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
    }

    .login-input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .btn-login {
      background-color: #D84040;
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
      margin-top: 10px;
    }

    .btn-login:hover {
      background-color: #8E1616;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="login-logo">
      <img src="{{ asset('logo.png') }}" alt="Logo">
      <span>Giftopia</span>
    </div>
    <h2 class="login-title">Login Admin</h2>

    @if ($errors->any())
      <p class="login-error">{{ $errors->first('msg') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
      @csrf
      <input name="username" placeholder="Username" class="login-input"><br>
      <input name="password" type="password" placeholder="Password" class="login-input"><br>
      <button type="submit" class="btn-login">Login</button>
    </form>
  </div>

</body>
</html>
