<h2>Dashboard Admin</h2>
<p>Selamat datang, admin!</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
