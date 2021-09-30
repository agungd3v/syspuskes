<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Puskesmas Tejoagung</title>
  <link rel="stylesheet" href="{{ asset('bootstrap5/bootstrap.min.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Puskesmas Tejoagung</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="btn btn-light" href="/login">Login Account</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container my-5">
    <div class="row">
      <div class="col-lg-5">
        <img src="{{ asset('puskesmas-tejo-agung.jpg') }}" class="img-thumbnail">
      </div>
      <div class="col-lg-7">
        <h3>Tentang UPTD Puskesmas Tejoagung</h3>
        <p>
          UPTD Puskesmas Tejoagung adalah lembaga kesehatan yang menyelenggarakan upaya kesehatan yang bersifat menyeluruh, terpadu, merata, dan dapat diterima dan terjangkau oleh masyarakat dengan peran serta aktif masyarakat dan menggunakan hasil pengembangan ilmu pengetahuan dari teknologi tepat guna, dengan biaya yang dapat dipikul oleh pemerintah dan masyarakat luas guna mencapai derajat kesehatan yang optimal.
        </p>
        <p class="mb-0">
          UPTD Puskesmas Tejoagung merupakan puskesmas yang terletak di Kelurahan Tejoagung, Kecamatan Metro Timur, Kabupaten Kota Metro. Dalam undang–undang no 36 tahun 2009 tentang kesehatan. Musyawarah daerah menyerahkan pada pengurus untuk mendirikan UPTD Puskesmas Tejo Agung sebagai sarana dalam meningkatkan mutu pelayanan kesehatan dasar. UPTD Puskesmas Tejo Agung mulai dibangun pada tanggal 02 februari 2010.
        </p>
      </div>
    </div>
    <div class="row" style="margin-top: 50px">
      <div class="col-lg-12">
        <h2 class="text-center">STRUKTUR ORGANISASI UPTD PUSKESMAS TEJOAGUNG</h3>
      </div>
    </div>
    <div class="row" style="margin-top: 100px">
      <div class="col-lg-6">
        <h3>VISI</h3>
        <ul class="mt-4">
          <li>
            Puskesmas Tejo Agung dalam melaksanakan fungsinya sejalan dengan Visi Kota Metro sebagai berikut : “Metro Kota Pendidikan dan Wisata Keluarga, Berbasis Ekonomi Kerakyatan berlandaskan  pembangunan Partisipatif.”
          </li>
        </ul>
      </div>
      <div class="col-lg-6">
        <h3>MISI</h3>
        <ul class="mt-4">
          <li>
            Menyelenggarakan pelayanan kesehatan tingkat pertama yang profesional, bermutu, terjangkau, adil merata.
          </li>
          <li>
            Meningkatkan profesionalisme SDM dalam pelaksanaan pelayanan kesehatan secara berkelanjutan sesuai kompetensi.
          </li>
          <li>
            Mewujudkan masyarakat peduli terhadap peningkatan derajat kesehatan agar masyarakat mampu menolong dirinya dalam masalah kesehatan.
          </li>
          <li>
            Menjadikan Puskesmas sebagai motivator menuju masyarakat sehat mandiri.
          </li>
        </ul>
      </div>
    </div>
  </div>
  <script src="{{ asset('bootstrap5/bootstrap.min.js') }}"></script>
</body>
</html>