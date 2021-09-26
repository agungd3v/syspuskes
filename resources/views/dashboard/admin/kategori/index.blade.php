@extends('layouts.dashboard')
@section('kategori', 'active')

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
          <h4><i class="fa fa-angle-right"></i> Kategori obat</h4>
          <button class="btn btn-primary" data-toggle="modal" data-target="#openKategori">Tambah kategori</button>
        </div>
        <hr>
        <thead>
          <tr>
            <th style="width: 100%"><i class="fa fa-bullhorn"></i> Nama kategori</th>
            <th><i class=" fa fa-edit"></i> Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kategoris as $kategori)
            <tr>
              <td>{{ $kategori->nama_kategori }}</td>
              <td>
                <div style="display: flex; gap: 6px">
                  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#kategori{{ $kategori->id }}"><i class="fa fa-pencil"></i> Update</button>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#katedel{{ $kategori->id }}"><i class="fa fa-trash-o "></i> Delete</button>
                </div>
              </td>
            </tr>
            <div class="modal fade" id="kategori{{ $kategori->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Kategori</h4>
                  </div>
                  <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori_edit" class="form-control" value="{{ $kategori->nama_kategori }}">
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
            <div class="modal fade" id="katedel{{ $kategori->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Kategori</h4>
                  </div>
                  <form action="{{ route('kategori.delete', $kategori->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <span>Yakin ingin menghapus kategori <strong class="text-danger">{{ $kategori->nama_kategori }}</strong> ?</span>
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
<div class="modal fade" id="openKategori" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Form Kategori</h4>
      </div>
      <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori">
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