<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
  public function index() {
    $kategoris = Kategori::orderBy('nama_kategori', 'asc')->get();
    return view('dashboard.admin.kategori.index', compact('kategoris'));
  }

  public function store(Request $request) {
    if ($request->nama_kategori) {
      $kategori = new Kategori();
      $kategori->nama_kategori = $request->nama_kategori;
      $kategori->save();

      return redirect()->route('kategori.index')->with('berhasil', 'Berhasil menambah kategori');
    }
    
    return redirect()->route('kategori.index')->with('errorMessage', 'Gagal menambah kategori');
  }

  public function update(Request $request, $id) {
    if ($request->nama_kategori_edit) {
      $kategori = Kategori::find($id);
      if ($kategori) {
        $kategori->nama_kategori = $request->nama_kategori_edit;
        $kategori->save();

        return redirect()->route('kategori.index')->with('berhasil', 'Berhasil mengubah kategori');
      }

      return redirect()->route('kategori.index')->with('errorMessage', 'Error mengubah kategori');
    }

    return redirect()->route('kategori.index')->with('errorMessage', 'Gagal mengubah kategori');
  }

  public function delete($id) {
    $kategori = Kategori::find($id);
    if ($kategori) {
      $kategori->delete();
      return redirect()->route('kategori.index')->with('berhasil', 'Kategori telah dihapus');
    }

    return redirect()->route('kategori.index')->with('errorMessage', 'Gagal menghapus kategori');
  }
}
