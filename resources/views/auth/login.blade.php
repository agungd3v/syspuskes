<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sistem Informasi Puskesmas">
  <meta name="author" content="agungd3v">
  <meta name="keyword" content="Sistem Informasi Puskesmas">
  <title>SYSPUSKES</title>
  <link href="{{ asset('favicon.ico') }}" rel="icon">
  <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
</head>

<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="{{ route('login') }}" method="POST">
        @csrf
        @error('email')
          <div class="alert alert-danger" style="margin-bottom: 0" role="alert">Email atau password salah</div>
        @enderror
        @error('password')
          <div class="alert alert-danger" style="margin-bottom: 0" role="alert">Email atau password salah</div>
        @enderror
        <div style="display: flex; justify-content: center; padding-top: 30px; padding-bottom: 20px">
          <img src="{{ asset('favicon.jpg') }}" alt="">
        </div>
        <div class="login-wrap">
          <input type="email" name="email" class="form-control" placeholder="Email address" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password">
          <br>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        </div>
      </form>
    </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("puskesmas-tejo-agung-keliling.jpg", {
      speed: 500
    });
  </script>
</body>
</html>
