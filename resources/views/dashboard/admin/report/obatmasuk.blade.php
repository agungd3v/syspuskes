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
      padding: 5px;
    }
    th {
      /* background-color: aqua */
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
        <img src="{{ public_path("LOGO_KOTA_METRO.png") }}" style="width: 70px">
      </td>
      <td style="border: none; width: 100%; text-align: center">
        <p style="text-align: center; line-height: 1; font-size: 30px; margin-bottom: 8px; font-weight: bold">DINAS KESEHATAN KOTA METRO</p>
        <span style="font-size: 35px; font-weight: bold; line-height: 0.7; margin-bottom: 0">PUSKESMAS TEJO AGUNG</span>
        <p style="line-height: 0.5; font-size: 20px; margin-bottom: 15px">Jl. A.Yani Gg.Blimbing No.2 Tejo Agung Kec.Metro Timur</p>
      </td>
      <td style="border: none">
        <img src="{{ public_path("favicon.jpg") }}" style="width: 100px">
      </td>
    </tr>
  </table>
  <div style="height: 1px; background: rgb(26, 25, 25);"></div>
  <div style="height: 1px; background: rgb(32, 31, 31);"></div>
  <div style="height: 1.5px; background: #000;"></div>
  <div style="text-align: center; margin-top: 30px">
    <span style="font-size: 15px; font-weight: bold">
      <u>LAPORAN OBAT MASUK</u>
    </span>
  </div>
  <table style="border: none; margin-top: 10px">
    <tr style="border: none">
      <td style="border: none">Tanggal</td>
      <td style="border: none">:</td>
      <td style="border: none; width: 100%">{{ date('d / m / Y', strtotime($isdate)) }}</td>
    </tr>
  </table>
  <table style="margin-top: 30px">
    <tr>
      <th rowspan="2" valign="middle">NO</th>
      <th rowspan="2" valign="middle">NAMA OBAT</th>
      <th rowspan="2" valign="middle">SATUAN</th>
      <th rowspan="2" valign="middle">STOK</th>
      <th colspan="{{ count($sumbers) }}">PENERIMAAN</th>
      <th rowspan="2" valign="middle">TOTAL</th>
    </tr>
    <tr>
      @foreach ($sumbers as $sumber)
        <th>{{ $sumber->nama_sumber }}</th>
      @endforeach
    </tr>
    @foreach ($obats as $obat)
      <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $obat->nama_obat }}</td>
        <td>{{ $obat->kategori->nama_kategori }}</td>
        <td>{{ $obat->stok_obat ? $obat->stok_obat : '-' }}</td>
        @foreach ($sumbers as $sumber)
          @php
            $obtin = $obat->obatmasuk()->where('sumber_id', $sumber->id)->whereDate('created_at', $isdate)->first();
          @endphp
          @if (isset($obtin))
            <td>{{ $obtin->jumlah }}</td>
          @else
            <td>-</td>
          @endif
        @endforeach
        <td>
          @php
            $sumtotal = $obat->obatmasuk()->whereDate('created_at', $isdate)->sum('jumlah');
            echo $sumtotal == 0 ? '-' : $sumtotal;
          @endphp
        </td>
      </tr>
    @endforeach
  </table>
  <div style="position: relative; top: 150px; margin-left: 0">
    <div style="width: 170px; border: 1px solid #000"></div>
    <span>( Menyerahkan/Pengelola )</span>
  </div>
  <div style="position: relative; top: 131px; margin-left: 440px">
    <div style="width: 145px; border: 1px solid #000"></div>
    <span>( Kepala Kefarmasian )</span>
  </div>
  <div style="position: relative; top: 111px; margin-left: 890px">
    <div style="width: 136px; border: 1px solid #000"></div>
    <span>( Kepala Puskesmas )</span>
  </div>
</body>
</html>