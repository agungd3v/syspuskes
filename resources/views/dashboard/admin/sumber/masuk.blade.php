@extends('layouts.dashboard')
@section('sumbermasuk', 'active')

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
      <table class="table table-striped table-advance table-hover" style="margin-bottom: 0">
        <div style="display: flex; align-items: center; justify-content: space-between">
          <h4><i class="fa fa-angle-right"></i> Sumber Obat Masuk</h4>
          <button class="btn btn-primary" data-toggle="modal" data-target="#openSumber">Tambah sumber obat masuk</button>
        </div>
        <hr>
        <thead>
          <tr>
            <th style="width: 100%"><i class="fa fa-bullhorn"></i> Nama sumber</th>
            <th><i class=" fa fa-edit"></i> Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sumbers as $sumber)
            <tr>
              <td>{{ $sumber->nama_sumber }}</td>
              <td>
                <div style="display: flex; gap: 6px">
                  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#sumdet{{ $sumber->id }}"><i class="fa fa-pencil"></i> Update</button>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#sumdel{{ $sumber->id }}"><i class="fa fa-trash-o "></i> Delete</button>
                </div>
              </td>
            </tr>
            <div class="modal fade" id="sumdet{{ $sumber->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Sumber Obat Masuk</h4>
                  </div>
                  <form action="{{ route('sumbermasuk.update', $sumber->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="nama_sumber_edit">Nama Kategori</label>
                        <input type="text" name="nama_sumber_edit" class="form-control" value="{{ $sumber->nama_sumber }}">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="sumdel{{ $sumber->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Sumber Obat Masuk</h4>
                  </div>
                  <form action="{{ route('sumbermasuk.delete', $sumber->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <span>Yakin ingin menghapus sumber <strong class="text-danger">{{ $sumber->nama_sumber }}</strong> ?</span>
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
<div class="modal fade" id="openSumber" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Form Sumber Obat Masuk</h4>
      </div>
      <form action="{{ route('sumbermasuk.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_sumber">Nama Sumber</label>
            <input type="text" name="nama_sumber" class="form-control" id="nama_sumber">
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