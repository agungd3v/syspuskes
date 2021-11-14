<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Puskesmas Tejoagung</title>
  <link rel="stylesheet" href="{{ asset('bootstrap5/bootstrap.min.css') }}">
  <style>
    .nav-pills .nav-link.active {
      color: #fff !important;
      background-color: #198754!important;
    }
    .nav-link {
      color: #198754!important
    }
  </style>
</head>
<body style="background: url('/IMG_20201229_103830.jpg'); background-size: cover">
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
  <div class="container mt-5">
    <div class="bg-white p-2 pt-5 rounded-top">
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="{{ asset('favicon.jpg') }}" class="img-fluid">
            <h2 class="text-center mt-3">UPTD PUSKESMAS TEJO AGUNG</h2>
          </div>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="bg-white">
        <div class="row">
          <div class="col-md-12"><hr></div>
        </div>
    </div>
  </div>
  <div class="container">
    <div class="bg-white p-2 pb-5 rounded-bottom">
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex align-items-start">
              <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active text-start" style="width: 200px" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Tentang</button>
                <button class="nav-link text-start" style="width: 200px" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Visi dan Misi</button>
                <button class="nav-link text-start" style="width: 200px" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tugas dan Fungsi</button>
                <button class="nav-link text-start" style="width: 200px" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Struktur</button>
              </div>
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <h3 class="mb-4">Tentang UPTD Puskesmas Tejoagung</h3>
                  <p>
                    UPTD Puskesmas Tejoagung adalah lembaga kesehatan yang menyelenggarakan upaya kesehatan yang bersifat menyeluruh, terpadu, merata, dan dapat diterima dan terjangkau oleh masyarakat dengan peran serta aktif masyarakat dan menggunakan hasil pengembangan ilmu pengetahuan dari teknologi tepat guna, dengan biaya yang dapat dipikul oleh pemerintah dan masyarakat luas guna mencapai derajat kesehatan yang optimal.
                  </p>
                  <p class="mb-0">
                    UPTD Puskesmas Tejoagung merupakan puskesmas yang terletak di Kelurahan Tejoagung, Kecamatan Metro Timur, Kabupaten Kota Metro. Dalam undang–undang no 36 tahun 2009 tentang kesehatan. Musyawarah daerah menyerahkan pada pengurus untuk mendirikan UPTD Puskesmas Tejo Agung sebagai sarana dalam meningkatkan mutu pelayanan kesehatan dasar. UPTD Puskesmas Tejo Agung mulai dibangun pada tanggal 02 februari 2010.
                  </p>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <div class="row gap-5">
                    <div class="col-lg-5">
                      <h3>VISI</h3>
                      <ul class="mt-4">
                        <li>
                          Puskesmas Tejo Agung dalam melaksanakan fungsinya sejalan dengan Visi Kota Metro sebagai berikut : “Metro Kota Pendidikan dan Wisata Keluarga, Berbasis Ekonomi Kerakyatan berlandaskan  pembangunan Partisipatif.”
                        </li>
                      </ul>
                    </div>
                    <div class="col-lg-5">
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
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                  <h3 class="mb-5">Tugas dan Fungsi Puskesmas Tejo Agung</h3>
                  <h4 class="mb-4">Tugas dan Wewenang Organisasi</h4>
                  <ol style="list-style-type: lower-alpha">
                    <li><strong>Pimpinan UPTD Puskesmas Tejo Agung</strong></li>
                    <ul>
                      <li>Mengkoordinir kegiatan penyuluhan kesehatan masyarakat.</li>
                      <li>Mengkoordinir pengembangan PKMD.</li>
                      <li>Membina karyawan-karyawati puskesmas dalam pelaksanaan tugas sehari-hari.</li>
                      <li>Melakukan pengawasan bagi seluruh pelaksanaan kegiatan/program.</li>
                      <li>Mengadakan koordinasi dengan lintas sektoral dalam upaya pembangunan kesehatan diwilayah kerja puskesmas.</li>
                      <li>Menjalin kemitraan dengan berbagai pihak dan masyarakat dalam rangka peningkatan derajat kesehatan masyarakat.</li>
                      <li>Menyusun perencanaan kegiatan puskesmas dengan dibantu oleh staf puskesmas Tejo Agung.</li>
                      <li>Membina petugas dalam meningkatkan mutu pelayanan.</li>
                    </ul>
                    <li class="mt-3"><strong>KA SUBAG TU</strong></li>
                    <ul>
                      <li>Merencanakan dan mengevaluasi kegiatan disetiap dan unit tata usaha.</li>
                      <li>Mengkoordinir kegiatan petugas bagian perbaikan sarana puskesmas.</li>
                      <li>Menggantikan tugas kepala puskesmas bila kepala puskesmas berhalangan hadir.</li>
                      <li>Mengkoordinir dan berperan aktif terhadap kegiatan disetiap sub bagian dan tata usaha.</li>
                    </ul>
                    <li class="mt-3"><strong>Sistem Informasi Puskesmas SIP</strong></li>
                    <ul>
                      <li>Sebagai pusat data dan informasi puskesmas.</li>
                      <li>Membantu kepala puskesmas dalam pengolahan data.</li>
                      <li>Bertanggung jawab terhadap kelengkapan data puskesmas.</li>
                      <li>Mengkoordinir seluruh laporan puskesmas dan melaporkannya ke dinas kesehatan.</li>
                      <li>Mengupulkan kelengkapan data yang diperlukan di puskesmas.</li>
                    </ul>
                  </ol>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                  <h3 class="mb-5">Struktur Puskesmas Tejo Agung</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <script src="{{ asset('bootstrap5/bootstrap.min.js') }}"></script>
</body>
</html>