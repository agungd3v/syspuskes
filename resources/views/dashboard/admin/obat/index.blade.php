@extends('layouts.dashboard')
@section('obat', 'active')

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
      <table id="tb-obat" class="table table-striped table-advance table-hover" style="margin-bottom: 0">
        <div style="display: flex; align-items: center; justify-content: space-between">
          <h4><i class="fa fa-angle-right"></i> Data obat</h4>
          <button class="btn btn-primary" data-toggle="modal" data-target="#openStok">Tambah Data Obat</button>
        </div>
        <hr>
        <thead>
          <tr>
            <th style="width: 100%"><i class="fa fa-bullhorn"></i> Nama obat</th>
            <th class="hidden-phone" style="white-space: nowrap"><i class="fa fa-question-circle"></i> Kategori obat</th>
            <th style="white-space: nowrap"><i class=" fa fa-edit"></i> Tanggal kadaluarsa</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($obats as $obat)
            <tr>
              <td>{{ $obat->nama_obat }}</td>
              <td class="hidden-phone" style="white-space: nowrap">{{ $obat->kategori->nama_kategori }}</td>
              <td><strong>{{ $obat->tanggal_kadaluarsa }}</strong></td>
              <td>
                <div style="display: flex; gap: 6px; padding-left: 20px">
                  <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#openView{{ $obat->id }}"><i class="fa fa-check"></i> Detail</button>
                  <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editStok{{ $obat->id }}"><i class="fa fa-pencil"></i> Update</button>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#obatDel{{ $obat->id }}"><i class="fa fa-trash-o "></i> Delete</button>
                </div>
              </td>
            </tr>
            <div class="modal fade" id="openView{{ $obat->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Tambah Obat</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group" style="display: flex; justify-content: center">
                      <img src="{{ asset($obat->gambar_obat) }}" style="width: 300px; height: 300px; object-fit: cover;">
                    </div>
                    <div class="form-group">
                      <label>Nama obat</label>
                      <p>
                        <strong>{{ $obat->nama_obat }}</strong>
                      </p>
                    </div>
                    <div class="form-group">
                      <label>Kategori obat</label>
                      <p>
                        <strong>{{ $obat->kategori->nama_kategori }}</strong>
                      </p>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi obat</label>
                      <p>
                        <strong>{{ $obat->deskripsi_obat }}</strong>
                      </p>
                    </div>
                    <div class="form-group">
                      <label>Tanggal kadaluarsa</label>
                      <p>
                        <strong>{{ $obat->tanggal_kadaluarsa }}</strong>
                      </p>
                    </div>
                    <div class="form-group">
                      <label>Stok obat</label>
                      <p>
                        <strong>{{ $obat->stok_obat }}</strong>
                      </p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="editStok{{ $obat->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Obat</h4>
                  </div>
                  <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="nama_obat_edit">Nama obat</label>
                        <input type="text" name="nama_obat_edit" class="form-control" id="nama_obat_edit" value="{{ $obat->nama_obat }}">
                      </div>
                      <div class="form-group">
                        <label for="kategori_id_edit">Kategori obat</label>
                        <select name="kategori_id_edit" id="kategori_id_edit" class="form-control">
                          <option value="" selected hidden>Pilih kategori</option>
                          @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $kategori->id == $obat->kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi_obat_edit">Deskripsi obat</label>
                        <textarea name="deskripsi_obat_edit" id="deskripsi_obat_edit" class="form-control" cols="30" rows="4">{{ $obat->deskripsi_obat }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_kadaluarsa_edit">Tanggal kadaluarsa</label>
                        <input type="date" name="tanggal_kadaluarsa_edit" class="form-control" id="tanggal_kadaluarsa_edit" value="{{ $obat->tanggal_kadaluarsa }}">
                      </div>
                      <div class="form-group">
                        <label for="gambar_obat_edit">
                          Jika ingin mengganti gambar klik tombol <strong class="text-danger">Choose File</strong>
                          <br />
                          Jika tidak ingin mengganti gambar biarkan kosong
                        </label>
                        <input type="file" name="gambar_obat_edit" class="form-control" id="gambar_obat_edit">
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
            <div class="modal fade" id="obatDel{{ $obat->id }}" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Form Obat</h4>
                  </div>
                  <form action="{{ route('obat.delete', $obat->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <span>Yakin ingin menghapus <strong class="text-danger">{{ $obat->nama_obat }}</strong> ?</span>
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
<div class="modal fade" id="openStok" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Form Obat</h4>
      </div>
      <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_obat">Nama obat</label>
            <input type="text" name="nama_obat" class="form-control" id="nama_obat">
          </div>
          <div class="form-group">
            <label for="kategori_id">Kategori obat</label>
            <select name="kategori_id" id="kategori_id" class="form-control">
              <option value="" selected hidden>Pilih kategori</option>
              @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="deskripsi_obat">Deskripsi obat</label>
            <textarea name="deskripsi_obat" id="deskripsi_obat" class="form-control" cols="30" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label for="tanggal_kadaluarsa">Tanggal kadaluarsa</label>
            <input type="date" name="tanggal_kadaluarsa" class="form-control" id="tanggal_kadaluarsa">
          </div>
          <div class="form-group">
            <label for="gambar_obat">Gambar obat</label>
            <input type="file" name="gambar_obat" class="form-control" id="gambar_obat">
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
@endpush

@push('js')
<script src="{{ asset('datatables/datatables.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#tb-obat').DataTable();
  });
</script>
@endpush