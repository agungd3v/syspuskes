@extends('layouts.dashboard')
@section('keluar', 'active')

@section('content')
<div class="row mt">
  <div class="col-md-8">
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
      <table class="table table-striped table-advance table-hover" style="margin-bottom: 0" id="tbobatkeluar">
        <div style="display: flex; align-items: center; justify-content: space-between">
          <h4><i class="fa fa-angle-right"></i> Obat keluar</h4>
          <button class="btn btn-primary" data-toggle="modal" style="width: 160px" data-target="#openObatKeluar">Tambah Obat Keluar</button>
        </div>
        <div style="display: flex; align-items: center; justify-content: flex-end; margin-top: 10px">
          <form action="{{ route('obat.keluar.report') }}" method="POST">
            @csrf
            <input type="date" name="date" class="form-control">
            <div style="width: 20px"></div>
            <button class="btn btn-warning" style="padding-left: 18px; padding-right: 18px" type="submit">Report Obat Keluar</button>
          </form>
        </div>
        <hr>
        <thead>
          <tr>
            <th></th>
            <th>Nama obat</th>
            <th>Kategori obat</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
      <form action="" method="POST" id="formdelete" style="display: none">
        @csrf
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="openObatKeluar" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Form Obat Keluar</h4>
      </div>
      <form action="{{ route('obat.keluar.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <select name="obat_id" id="obat_id" class="form-control" style="width: 100%">
              <option value="" selected hidden>Pilih obat</option>
              @foreach ($obats as $obat)
                @if ($obat->stok_obat)
                  <option value="{{ $obat }}">{{ $obat->nama_obat }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select name="sumber_id" id="sumber_id" class="form-control" style="width: 100%">
              <option value="" selected hidden>Pilih sumber</option>
              @foreach ($sumbers as $sumber)
                <option value="{{ $sumber }}">{{ $sumber->nama_sumber }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
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

@push('css')
<link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}">
<style>
  td.details-control {
    background: url('/datatables/details_open.png') no-repeat center center;
    cursor: pointer;
  }
  tr.shown td.details-control {
    background: url('/datatables/details_close.png') no-repeat center center;
  }
</style>
@endpush

@push('js')
<script src="{{ asset('datatables/datatables.min.js') }}"></script>
<script src="{{ asset('select2/select2.min.js') }}"></script>
<script>
  function deleteobatmasuk(urid) {
    const form = document.getElementById('formdelete')
    form.setAttribute('action', urid)
    form.submit()
  }
  function format (d) {
    let data = ''
    $.each($(d.obatkeluar), function(key, dtx){
      data += `
        <tr>
          <td>${dtx.sumberobatkeluar.nama_sumber}</td>
          <td>${dtx.jumlah}</td>
          <td>${new Date(dtx.created_at).toLocaleDateString()}</td>
          <td>${new Date(dtx.created_at).toLocaleTimeString()}</td>
          <td><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#datadel${dtx.id}">Delete</button></td>
        </tr>
        <div class="modal fade" id="datadel${dtx.id}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form Obat Keluar</h4>
              </div>
              <div class="modal-body">
                <span>Yakin ingin menghapus data obat masuk ini ?</span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteobatmasuk('/dashboard/gudang/obat/keluar/delete/${dtx.id}')">Hapus Data</button>
              </div>
            </div>
          </div>
        </div>
      `
    })
    return `
      <table class="table table-advance table-hover" style="margin-bottom: 0">
        <tr class="bg-danger">
          <th>Nama sumber</th>
          <th>Jumlah obat keluar</th>
          <th>Tanggal keluar</th>
          <th>Jam keluar</th>
          <td>Action</th>
        </tr>
        ${data}
      </table>
    `
  }
 
  $(document).ready(function() {
    var table = $('#tbobatkeluar').DataTable({
      "ajax": "/api/obat",
      "columns": [
          {
              "className":      'details-control',
              "orderable":      false,
              "data":           null,
              "defaultContent": ''
          },
          { "data": "nama_obat" },
          { "data": "kategori.nama_kategori" }
      ],
      "order": [[1, 'asc']]
    });

    $('#tbobatkeluar tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );

      if ( row.child.isShown() ) {
        row.child.hide();
        tr.removeClass('shown');
      }
      else {
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
      }
    });

    function matchCustom(params, data) {
      if ($.trim(params.term) === '') {
        return data;
      }

      if (typeof data.text === 'undefined') {
        return null;
      }

      if (data.text.indexOf(params.term) > -1) {
        var modifiedData = $.extend({}, data, true);
        modifiedData.text += ' (matched)';
        return modifiedData;
      }
      return null;
    }

    $("#obat_id").select2({
      matcher: matchCustom
    });

    $("#sumber_id").select2({
      matcher: matchCustom
    });
  });
</script>
@endpush