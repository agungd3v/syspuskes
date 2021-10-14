@extends('layouts.dashboard')
@section('apotiklaporan', 'active')

@section('content')
<div class="row mt">
  <div class="col-md-7">
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
      <div style="display: flex; align-items: center; justify-content: space-between">
        <h3>Report laporan</h3>
        <form action="{{ route('apotik.report') }}" method="POST">
          @csrf
          <div style="display: flex; align-items: flex-end; gap: 10px">
            <div class="form-group" style="margin-bottom: 0">
              <label for="from">Dari</label>
              <input type="date" class="form-control" name="from">
            </div>
            <div class="form-group" style="margin-bottom: 0">
              <label for="to">Sampai</label>
              <input type="date" class="form-control" name="to">
            </div>
            <div class="form-group" style="margin-bottom: 0">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <hr>
      <table id="tb-laporan" class="table table-bordered">
        <thead>
          <tr>
            <th>Nama obat</th>
            <th>Nama pasien</th>
            <th>Jumlah obat</th>
            <th>Dosis obat</th>
            <th>Tanggal</th>
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
    </div>
  </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('datatables/datatables.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#tb-laporan').DataTable();
  });
</script>
@endpush