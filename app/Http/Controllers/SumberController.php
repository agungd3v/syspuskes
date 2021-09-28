<?php

namespace App\Http\Controllers;

use App\SumberObatKeluar;
use Illuminate\Http\Request;
use App\SumberObatMasuk;

class SumberController extends Controller
{
  public function sumbermasuk() {
    $sumbers = SumberObatMasuk::orderBy('nama_sumber', 'asc')->get();
    return view('dashboard.admin.sumber.masuk', compact('sumbers'));
  }

  public function sumbermasukstore(Request $request) {
    if ($request->nama_sumber) {
      $sumber = new SumberObatMasuk();
      $sumber->nama_sumber = $request->nama_sumber;
      $sumber->save();

      return redirect()->route('sumbermasuk.index')->with('berhasil', 'Berhasil menambah sumber');
    }
    
    return redirect()->route('sumbermasuk.index')->with('errorMessage', 'Gagal menambah sumber');
  }

  public function sumbermasukupdate(Request $request, $id) {
    if ($request->nama_sumber_edit) {
      $sumber = SumberObatMasuk::find($id);
      if ($sumber) {
        $sumber->nama_sumber = $request->nama_sumber_edit;
        $sumber->save();

        return redirect()->route('sumbermasuk.index')->with('berhasil', 'Berhasil mengubah sumber');
      }

      return redirect()->route('sumbermasuk.index')->with('errorMessage', 'Error mengubah sumber');
    }

    return redirect()->route('sumbermasuk.index')->with('errorMessage', 'Gagal mengubah sumber');
  }

  public function sumbermasukdelete($id) {
    $sumber = SumberObatMasuk::find($id);
    if ($sumber) {
      $sumber->delete();
      return redirect()->route('sumbermasuk.index')->with('berhasil', 'Sumber telah dihapus');
    }

    return redirect()->route('sumbermasuk.index')->with('errorMessage', 'Gagal menghapus sumber');
  }

  public function sumberkeluar() {
    $sumbers = SumberObatKeluar::orderBy('nama_sumber', 'asc')->get();
    return view('dashboard.admin.sumber.keluar', compact('sumbers'));
  }

  public function sumberkeluarstore(Request $request) {
    if ($request->nama_sumber) {
      $sumber = new SumberObatKeluar();
      $sumber->nama_sumber = $request->nama_sumber;
      $sumber->save();

      return redirect()->route('sumberkeluar.index')->with('berhasil', 'Berhasil menambah sumber');
    }
    
    return redirect()->route('sumberkeluar.index')->with('errorMessage', 'Gagal menambah sumber');
  }

  public function sumberkeluarupdate(Request $request, $id) {
    if ($request->nama_sumber_edit) {
      $sumber = SumberObatKeluar::find($id);
      if ($sumber) {
        $sumber->nama_sumber = $request->nama_sumber_edit;
        $sumber->save();

        return redirect()->route('sumberkeluar.index')->with('berhasil', 'Berhasil mengubah sumber');
      }

      return redirect()->route('sumberkeluar.index')->with('errorMessage', 'Error mengubah sumber');
    }

    return redirect()->route('sumberkeluar.index')->with('errorMessage', 'Gagal mengubah sumber');
  }

  public function sumberkeluardelete($id) {
    $sumber = SumberObatKeluar::find($id);
    if ($sumber) {
      $sumber->delete();
      return redirect()->route('sumberkeluar.index')->with('berhasil', 'Sumber telah dihapus');
    }

    return redirect()->route('sumberkeluar.index')->with('errorMessage', 'Gagal menghapus sumber');
  }
}
