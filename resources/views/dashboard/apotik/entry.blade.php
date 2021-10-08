@extends('layouts.dashboard')
@section('apotikentry', 'active')

@section('content')
<div class="row mt">
  <div class="col-md-6">
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
      <div style="margin-bottom: 10px"></div>
      <form action="{{ route('apotik.post') }}" method="POST">
        @csrf
        <div class="form-group">
          <select name="obat_id" id="obat_id" class="form-control" style="width: 100%">
            <option value="" selected hidden>Pilih obat</option>
            @foreach ($obats as $obat)
              <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nama_pasien">Nama pasien</label>
          <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" placeholder="Nama pasien">
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="jumlah">Jumlah obat</label>
              <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah obat">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="dosis">Dosis</label>
              <div style="display: flex; align-items: center">
                <input type="text" class="form-control" name="dosis" id="dosis" placeholder="eg: 2x3">
                <span style="font-size: 20px; padding: 0 8px 0 10px">/</span>
                <span style="font-size: 20px">Hari</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('select2/select2.min.js') }}"></script>
<script>
  $(document).ready(function() {
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
  });
</script>
@endpush