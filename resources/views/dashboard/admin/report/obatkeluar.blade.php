<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Report obat keluar</title>
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
      background-color: rgba(255, 187, 0, 0.425);
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th></th>
      <th align="left">Nama obat</th>
      <th align="left">Sumber</th>
      <th align="left">Jumlah</th>
    </tr>
    @foreach ($obatkeluars as $keluar)
      <tr class="lsitm">
        <td>{{ date('d / m / Y', strtotime($keluar->created_at)) }}</td>
        <td>{{ $keluar->obat->nama_obat }}</td>
        <td>{{ $keluar->sumberobatkeluar->nama_sumber }}</td>
        <td>{{ $keluar->jumlah }}</td>
      </tr>
    @endforeach
</body>
</html>