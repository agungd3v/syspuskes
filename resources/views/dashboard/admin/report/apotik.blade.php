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
  <div style="position: fixed; bottom: 0; margin-left: 560px">
    <div style="width: 136px; border: 1px solid #000"></div>
    <span>( Kepala Puskesmas )</span>
  </div>
</body>
</html>