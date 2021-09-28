<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Report obat masuk</title>
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
  @foreach ($obats as $obat)
    @if (count($obat->obatmasuk) > 0)
      <table>
        <tr>
          <th align="left">Nama obat</th>
          <th align="left">Kategori obat</th>
          <th align="left">Stok obat</th>
        </tr>
        <tr>
          <td>{{ $obat->nama_obat }}</td>
          <td>{{ $obat->kategori->nama_kategori }}</td>
          <td>{{ $obat->stok_obat }}</td>
        </tr>
        <tr>
          <th colspan="3">Daftar <span style="text-transform: lowercase">{{ $obat->nama_obat }}</span> masuk</th>
        </tr>
        @foreach ($obat->obatmasuk as $obatmasuk)
          <tr class="lsitm">
            <td colspan="2">{{ $obatmasuk->sumberobatmasuk->nama_sumber }}</td>
            <td>{{ $obatmasuk->jumlah }}</td>
          </tr>
        @endforeach
      </table>
    @endif
  @endforeach
</body>
</html>