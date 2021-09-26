<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sistem Informasi Puskesmas">
  <meta name="author" content="agungd3v">
  <meta name="keyword" content="Sistem Informasi Puskesmas">
  <title>SYSPUSKES</title>
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
</head>

<body>
  <section id="container">
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <a href="/dashboard" class="logo"><b>SYS<span>puskes</span></b></a>
      <div class="nav notify-row" id="top_menu"></div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
            <a class="logout" href="login.html">Logout</a>
          </li>
        </ul>
      </div>
    </header>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            <a href="profile.html"><img src="{{ asset('img/ui-sam.jpg') }}" class="img-circle" width="80"></a>
          </p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a href="/dashboard">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="@yield('obat')@yield('kategori')">
              <i class="fa fa-desktop"></i>
              <span>Obat</span>
            </a>
            <ul class="sub">
              <li class="@yield('kategori')">
                <a href="{{ route('kategori.index') }}">Kategori obat</a>
              </li>
              <li class="@yield('obat')">
                <a href="{{ route('obat.index') }}">Stok obat</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="@yield('keluar')@yield('masuk')">
              <i class="fa fa-cogs"></i>
              <span>Operasional</span>
            </a>
            <ul class="sub">
              <li class="@yield('masuk')">
                <a href="{{ route('obat.masuk.index') }}">Obat masuk</a>
              </li>
              <li class="@yield('keluar')">
                <a href="{{ route('obat.keluar.index') }}">Obat keluar</a>
              </li>
              <li>
                <a href="#">Order</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        @yield('content')
      </section>
    </section>
  </section>
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset('lib/common-scripts.js') }}"></script>
  @stack('js')
</body>
</html>
