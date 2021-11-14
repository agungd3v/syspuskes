<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Report Apotik</title>
  <style>
    table, th, td {
      border: 1px solid #000;
      border-collapse: collapse;
    }
    table {
      width: 100%;
      margin-bottom: 30px
    }
    th, td {
      padding: 10px;
    }
    th {
      background-color: aqua
    }
    .lsitm td {
      background-color: greenyellow;
    }
  </style>
</head>
<body>
  <table style="margin-bottom: 5px; border: none">
    <tr style="border: none">
      <td style="border: none">
        <img src="{{ public_path("LOGO_KOTA_METRO.png") }}" style="width: 50px">
      </td>
      <td style="border: none; width: 100%; text-align: center">
        <span style="font-size: 30px; font-weight: bold">PUSKESMAS TEJO AGUNG</span>
      </td>
    </tr>
  </table>
  <div style="height: 1px; background: rgb(26, 25, 25);"></div>
  <div style="height: 1px; background: rgb(32, 31, 31);"></div>
  <div style="height: 1.5px; background: #000;"></div>
  <div style="text-align: center; margin-top: 30px">
    <span style="font-size: 15px; font-weight: bold">
      <u>SURAT BUKTI PENGELUARAN OBAT</u>
    </span>
  </div>
  <table style="border: none; margin-top: 20px">
    <tr style="border: none">
      <td style="border: none">Dikeluarkan&nbsp;Oleh</td>
      <td style="border: none">:</td>
      <td style="border: none; width: 100%">Puskesmas Tejo Agung</td>
    </tr>
    <tr style="border: none">
      <td style="border: none; padding-top: 0">Tanggal</td>
      <td style="border: none; padding-top: 0">:</td>
      <td style="border: none; padding-top: 0; width: 100%">{{ date('d/m/Y', strtotime($from)) }} <b>s.d</b> {{ date('d/m/Y', strtotime($to)) }}</td>
    </tr>
  </table>
  <table>
    <thead>
      <tr>
        <th>NAMA OBAT</th>
        <th>NAMA PASIEN</th>
        <th>JUMLAH OBAT</th>
        <th>DOSIS</th>
        <th>TANGGAL</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($laporans as $laporan)
        <tr>
          <td>{{ $laporan->obat->nama_obat }}</td>
          <td>{{ $laporan->nama_pasien }}</td>
          <td>{{ $laporan->jumlah }}</td>
          <td>{{ $laporan->dosis }}</td>
          <td>{{ date('d/m/Y', strtotime($laporan->created_at)) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div style="position: fixed; bottom: 0; margin-left: 0">
    <div style="width: 143px; border: 1px solid #000"></div>
    <span>( Yang Menyerahkan )</span>
  </div>
  <div style="position: fixed; bottom: 0; margin-left: 300px">
    <div style="width: 120px; border: 1px solid #000"></div>
    <span>( Yang Menerima )</span>
  </div>
  <div style="position: fixed; bottom: 0; margin-left: 560px">
    <div style="width: 136px; border: 1px solid #000"></div>
    <span>( Kepala Puskesmas )</span>
  </div>
</body>
</html>