
<nav class="navbar navbar-expand-sm navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Pinjam<span>CTP</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars"></span> Menu
  </button>
  <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item @if(\Request::is('/')) active @endif"><a href="/" class="nav-link">Beranda</a></li>
        <li class="nav-item"><a href="{{ route('aboutus') }}" class="nav-link">Tentang</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Layanan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('login') }}">Peminjaman Ruangan</a>
            <a class="dropdown-item" href="{{ route('login') }}">Peminjaman Barang</a>
            <a class="dropdown-item" href="{{ route('login') }}">Pendaftaran Kp, <br>Magang dan Penelitian</a>
          </div>
        </li>
      <li class="nav-item"><a href="{{ route('contactus') }}" class="nav-link">Kontak</a></li>
    </ul>
  </div>
</div>
</nav>
<!-- END nav -->
