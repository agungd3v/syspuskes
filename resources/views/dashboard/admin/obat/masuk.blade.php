@extends('layouts.dashboard')
@section('masuk', 'active')

@section('content')
<div class="row mt">
  <div class="col-md-12">
    <div class="content-panel" style="padding: 20px">
      @if (session()->has('berhasil'))
        <div class="alert alert-info" role="alert">{{ session()->get('berhasil') }}</div>
      @endif
      @if (session()->has('errorMessage'))
        <div class="alert alert-danger" role="alert">{{ session()->get('errorMessage') }}</div>
      @endif
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
      @endif
      <table class="table table-striped table-advance table-hover" style="margin-bottom: 0">
        <div style="display: flex; align-items: center; justify-content: space-between">
          <h4><i class="fa fa-angle-right"></i> Obat Masuk</h4>
          <button class="btn btn-primary" data-toggle="modal" data-target="#openObatMasuk">Tambah Obat Masuk</button>
        </div>
        <hr>
        <thead>
          <tr>
            <th style="width: 100%"><i class="fa fa-bullhorn"></i> Nama obat</th>
            <th class="hidden-phone" style="white-space: nowrap"><i class="fa fa-question-circle"></i> Kategori obat</th>
            <th style="white-space: nowrap"><i class="fa fa-bookmark"></i> Harga obat</th>
            <th style="white-space: nowrap"><i class=" fa fa-edit"></i> Tersedia</th>
            <th style="white-space: nowrap" class="bg-success"><i class=" fa fa-edit"></i> Jumlah</th>
            <th style="white-space: nowrap" class="bg-success"><i class=" fa fa-edit"></i> Total</th>
            {{-- <th></th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($obatmasuks as $obatmasuk)
            <tr style="cursor: pointer" data-toggle="modal" data-target="#datadel{{ $obatmasuk->id }}">
              <td>{{ $obatmasuk->obat->nama_obat }}</td>
              <td class="hidden-phone" style="white-space: nowrap">{{ $obatmasuk->obat->kategori->nama_kategori }}</td>
              <td>Rp {{ number_format($obatmasuk->obat->harga_obat, 2, ',', '.') }}</td>
              <td><strong>{{ $obatmasuk->obat->stok_obat }}</strong></td>
              <td class="bg-success"><strong>{{ $obatmasuk->jumlah }}</strong></td>
              <td style="white-space: nowrap" class="bg-info">Rp {{ number_format($obatmasuk->total, 2, ',', '.') }}</td>
              {{-- <td>
                <div style="display: flex; gap: 6px; padding-left: 20px">
                  <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#openView{{ $obatkeluar->id }}"><i class="fa fa-check"></i> Detail</button>
                </div>
              </td> --}}
            </tr>
            <div class="modal fade" id="datadel{{ $obatmasuk->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Obat Keluar</h4>
                  </div>
                  <form action="{{ route('obat.masuk.delete', $obatmasuk->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <span>Yakin ingin menghapus data obat masuk ini ?</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Hapus Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="openObatMasuk" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Form Obat Masuk</h4>
      </div>
      <form action="{{ route('obat.masuk.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <select name="obat_id" class="form-control" onchange="getObat(this.value)">
              <option value="" selected hidden>Pilih obat</option>
              @foreach ($obats as $obat)
                @if ($obat->stok_obat)
                  <option value="{{ $obat }}">{{ $obat->nama_obat }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group" id="showitm" style="display: none">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td id="nama_obat" style="width: 100%"></td>
                  <td id="harga_obat"></td>
                  <td id="stok_obat"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group" id="showout" style="display: none">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  function getObat(obj) {
    const data = JSON.parse(obj)
    const tbNama = document.getElementById('nama_obat')
    const tbHarga = document.getElementById('harga_obat')
    const tbStok = document.getElementById('stok_obat')

    document.getElementById('showitm').removeAttribute('style')
    document.getElementById('showout').removeAttribute('style')
    tbNama.textContent = data.nama_obat
    tbHarga.textContent = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR'
    }).format(data.harga_obat)
    tbStok.textContent = data.stok_obat
  }
</script>
@endpush