<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\Kategori;
use App\ObatKeluar;
use App\ObatMasuk;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
  public function index() {
    $kategoris = Kategori::orderBy('nama_kategori', 'asc')->get();
    $obats = Obat::with('kategori')->orderBy('stok_obat', 'asc')->get();
    return view('dashboard.admin.obat.index', compact('kategoris', 'obats'));
  }

  public function store(Request $request) {
    $request->validate([
      'kategori_id' => 'required',
      'nama_obat' => 'required',
      'deskripsi_obat' => 'required',
      'harga_obat' => 'required',
      'stok_obat' => 'required'
    ]);

    $obat = new Obat();
    
    if ($request->hasFile('gambar_obat')) {
      $gambar = $request->gambar_obat;
      $jpgFormat = 'image/jpeg';
      $pngFormat = 'image/png';

      if ($gambar->getSize() > 1000000) {
        return redirect()->route('obat.index')->with('errorMessage', 'Maksimal file 1MB');
      }

      if ($gambar->getClientMimeType() == $jpgFormat || $gambar->getClientMimeType() == $pngFormat) {
        $path = $request->file('gambar_obat')->store('public/obat');
        $sendPath = explode('/', $path);
        $obat->gambar_obat = 'storage/'. $sendPath[1] .'/'. $sendPath[2];
      } else {
        return redirect()->route('obat.index')->with('errorMessage', 'Hanya format gambar jpg, jpeg, dan png yang diterima');
      }

      $obat->nama_obat = $request->nama_obat;
      $obat->kategori_id = $request->kategori_id;
      $obat->deskripsi_obat = $request->deskripsi_obat;
      $obat->harga_obat = intval($request->harga_obat);
      $obat->stok_obat = intval($request->stok_obat);
      $obat->save();

      return redirect()->route('obat.index')->with('berhasil', 'Berhasil menambah stok obat');
    } else {
      return redirect()->route('obat.index')->with('errorMessage', 'Gambar belum dipilih');
    }
  }

  public function update(Request $request, $id) {
    $request->validate([
      'kategori_id_edit' => 'required',
      'nama_obat_edit' => 'required',
      'deskripsi_obat_edit' => 'required',
      'harga_obat_edit' => 'required'
    ]);

    $obat = Obat::find($id);

    if ($obat) {
      if ($request->hasFile('gambar_obat_edit')) {
        $gambar = $request->gambar_obat_edit;
        $jpgFormat = 'image/jpeg';
        $pngFormat = 'image/png';

        if ($gambar->getSize() > 1000000) {
          return redirect()->route('obat.index')->with('errorMessage', 'Maksimal file 1MB');
        }

        if ($gambar->getClientMimeType() == $jpgFormat || $gambar->getClientMimeType() == $pngFormat) {
          $pathFile = explode('/', $obat->gambar_obat);
          Storage::delete('public/'. $pathFile[1] .'/'. $pathFile[2]);

          $path = $request->file('gambar_obat_edit')->store('public/obat');
          $sendPath = explode('/', $path);
          $obat->gambar_obat = 'storage/'. $sendPath[1] .'/'. $sendPath[2];
        } else {
          return redirect()->route('obat.index')->with('errorMessage', 'Hanya format gambar jpg, jpeg, dan png yang diterima');
        }
      }

      $obat->nama_obat = $request->nama_obat_edit;
      $obat->kategori_id = $request->kategori_id_edit;
      $obat->deskripsi_obat = $request->deskripsi_obat_edit;
      $obat->harga_obat = intval($request->harga_obat_edit);
      $obat->save();

      return redirect()->route('obat.index')->with('berhasil', 'Berhasil mengubah data obat');
    } else {
      return redirect()->route('obat.index')->with('errorMessage', 'Gagal mengubah data obat');
    }
  }

  public function delete($id) {
    $obat = Obat::find($id);
    if ($obat) {
      $pathFile = explode('/', $obat->gambar_obat);
      Storage::delete('public/'. $pathFile[1] .'/'. $pathFile[2]);
      $obat->delete();

      return redirect()->route('obat.index')->with('berhasil', 'Data obat telah dihapus');
    } else {
      return redirect()->route('obat.index')->with('errorMessage', 'Gagal menghapus data obat');
    }
  }

  public function obatkeluar() {
    $obats = Obat::orderBy('nama_obat', 'asc')->get();
    $obatkeluars = ObatKeluar::orderBy('total', 'asc')->get();
    return view('dashboard.admin.obat.keluar', compact('obats', 'obatkeluars'));
  }

  public function obatkeluarstore(Request $request) {
    $request->validate([
      'obat_id' => 'required',
      'jumlah' => 'required'
    ]);

    $reqObat = json_decode($request->obat_id);
    $reqJumlah = $request->jumlah;

    if ($reqObat->stok_obat < $reqJumlah) {
      return redirect()->route('obat.keluar.index')->with('errorMessage', 'Jumlah melebihi stok yang tersedia');
    }

    $obat = Obat::find($reqObat->id);
    $obatKeluar = new ObatKeluar();

    if ($obat) {
      $obatKeluar->obat_id = $obat->id;
      $obatKeluar->jumlah = $reqJumlah;
      $obatKeluar->total = ($obat->harga_obat * $reqJumlah);
      $obatKeluar->save();

      $obat->stok_obat = ($obat->stok_obat - $reqJumlah);
      $obat->save();

      return redirect()->route('obat.keluar.index')->with('berhasil', 'Berhasil menambahkan obat keluar');
    } else {
      return redirect()->route('obat.keluar.index')->with('errorMessage', 'Data obat tidak ditemukan');
    }
  }

  public function obatkeluardelete($id) {
    $obatkeluar = ObatKeluar::find($id);
    if ($obatkeluar) {
      $obat = Obat::find($obatkeluar->obat_id);
      if ($obat) {
        $obat->stok_obat = ($obat->stok_obat + $obatkeluar->jumlah);
        $obat->save();

        $obatkeluar->delete();

        return redirect()->route('obat.keluar.index')->with('berhasil', 'Data obat keluar telah dihapus');
      } else {
        return redirect()->route('obat.keluar.index')->with('errorMessage', 'Data obat tidak ditemukan');
      }
    } else {
      return redirect()->route('obat.keluar.index')->with('errorMessage', 'Gagal menghapus data obat keluar');
    }
  }

  public function obatmasuk() {
    $obats = Obat::orderBy('nama_obat', 'asc')->get();
    $obatmasuks = ObatMasuk::orderBy('total', 'asc')->get();
    return view('dashboard.admin.obat.masuk', compact('obats', 'obatmasuks'));
  }

  public function obatmasukstore(Request $request) {
    $request->validate([
      'obat_id' => 'required',
      'jumlah' => 'required'
    ]);

    $reqObat = json_decode($request->obat_id);
    $reqJumlah = $request->jumlah;

    if ($reqObat->stok_obat < $reqJumlah) {
      return redirect()->route('obat.masuk.index')->with('errorMessage', 'Jumlah melebihi stok yang tersedia');
    }

    $obat = Obat::find($reqObat->id);
    $obatMasuk = new ObatMasuk();

    if ($obat) {
      $obatMasuk->obat_id = $obat->id;
      $obatMasuk->jumlah = $reqJumlah;
      $obatMasuk->total = ($obat->harga_obat * $reqJumlah);
      $obatMasuk->save();

      $obat->stok_obat = ($obat->stok_obat - $reqJumlah);
      $obat->save();

      return redirect()->route('obat.masuk.index')->with('berhasil', 'Berhasil menambahkan obat masuk');
    } else {
      return redirect()->route('obat.masuk.index')->with('errorMessage', 'Data obat tidak ditemukan');
    }
  }

  public function obatmasukdelete($id) {
    $obatmasuk = ObatMasuk::find($id);
    if ($obatmasuk) {
      $obat = Obat::find($obatmasuk->obat_id);
      if ($obat) {
        $obat->stok_obat = ($obat->stok_obat + $obatmasuk->jumlah);
        $obat->save();

        $obatmasuk->delete();

        return redirect()->route('obat.masuk.index')->with('berhasil', 'Data obat masuk telah dihapus');
      } else {
        return redirect()->route('obat.masuk.index')->with('errorMessage', 'Data obat tidak ditemukan');
      }
    } else {
      return redirect()->route('obat.masuk.index')->with('errorMessage', 'Gagal menghapus data obat masuk');
    }
  }
}
